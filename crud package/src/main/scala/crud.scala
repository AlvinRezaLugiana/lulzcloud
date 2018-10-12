package spark.jobserver

import com.typesafe.config.{Config, ConfigFactory}
import org.apache.spark._
import org.apache.spark.SparkContext._
import scala.util.Try
import com.datastax.spark.connector._
import org.apache.spark.sql.cassandra._

object CreateDB extends SparkJob {
  override def validate(sc: SparkContext, config: Config): SparkJobValidation = {
    Try(config.getString("data.input"))
      .map(x => SparkJobValid)
      .getOrElse(SparkJobInvalid("No data.input config param"))
  }

  override def runJob(sc: SparkContext, config: Config): Any = {
	var input = config.getString("data.input").split(",")
	val collection = sc.parallelize(Seq((input(0),input(1),input(2),input(3),input(4), 0, input(5))))
	collection.saveToCassandra("cloudcomputing", "meme", SomeColumns("id", "title", "author", "file", "time", "likes", "category"))
  }
}

object ReadDB extends SparkJob {
  override def validate(sc: SparkContext, config: Config): SparkJobValidation = {
    Try(config.getString("data.input"))
      .map(x => SparkJobValid)
      .getOrElse(SparkJobInvalid("No data.input config param"))
  }

  override def runJob(sc: SparkContext, config: Config): Any = {
	var raw_input = config.getString("data.input")
	if(raw_input == "all"){
		val cassandra = sc.cassandraTable("cloudcomputing", "meme")
		var count = cassandra.count()
		if (count.toInt > 0){
			cassandra.take(count.toInt)
		}
	} else {
		sc.cassandraTable("cloudcomputing", "meme").where("category = ?",raw_input.toInt).toArray
	}
  }
}

object DeleteDB extends SparkJob {
  override def validate(sc: SparkContext, config: Config): SparkJobValidation = {
    Try(config.getString("data.input"))
      .map(x => SparkJobValid)
      .getOrElse(SparkJobInvalid("No data.input config param"))
  }

  override def runJob(sc: SparkContext, config: Config): Any = {
	var input = config.getString("data.input").split(",")
	sc.cassandraTable("cloudcomputing", "meme").where("category = ?",input(0)).where("title = ?",input(1)).where("id = ?",input(2)).deleteFromCassandra("cloudcomputing", "meme")
  }
}

object UpdateDB extends SparkJob {
  override def validate(sc: SparkContext, config: Config): SparkJobValidation = {
    Try(config.getString("data.input"))
      .map(x => SparkJobValid)
      .getOrElse(SparkJobInvalid("No data.input config param"))
  }

  override def runJob(sc: SparkContext, config: Config): Any = {
	var input = config.getString("data.input").split(",")
	val collection = sc.parallelize(Seq((input(0),input(1),input(2),input(3),input(4), input(5), input(6))))
	collection.saveToCassandra("cloudcomputing", "meme", SomeColumns("id", "title", "author", "file", "time", "likes", "category"))
  }
}

object AvgLikes extends SparkJob {
  override def validate(sc: SparkContext, config: Config): SparkJobValidation = {
	Try(config.getString("data.input"))
      .map(x => SparkJobValid)
      .getOrElse(SparkJobInvalid("No data.input config param"))
  }

  override def runJob(sc: SparkContext, config: Config): Any = {
	if (config.getString("data.input") == "GO"){
		val cassandra = sc.cassandraTable("cloudcomputing", "meme")
		cassandra.map(_.getInt("likes")).sum / cassandra.select("likes").count().toInt
	}
  }
}