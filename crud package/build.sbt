name := "CRUD"

version := "1.0"

scalaVersion := "2.10.7"

libraryDependencies ++= Seq(
  "org.apache.spark" %% "spark-core" % "1.6.1",
  "org.apache.spark" %% "spark-sql" % "1.6.1",
  "org.apache.spark" %% "spark-mllib" % "1.6.1",
  "org.apache.spark" %% "spark-streaming" % "1.6.1"
)

libraryDependencies += "com.datastax.spark" %% "spark-cassandra-connector" % "1.6.12"
libraryDependencies += "spark.jobserver" %% "job-server-api" % "0.6.2"
libraryDependencies += "com.typesafe" % "config" % "1.3.0"
libraryDependencies += "org.scalactic" %% "scalactic" % "3.0.5"

resolvers += "Spark Job Server Repository" at "https://dl.bintray.com/spark-jobserver/maven/"


dependencyOverrides += "org.scalamacros" % "quasiquotes_2.10" % "2.0.0-M8"
dependencyOverrides += "commons-net" % "commons-net" % "2.2"
dependencyOverrides += "com.google.guava" % "guava" % "11.0.2"
dependencyOverrides += "com.google.code.findbugs" % "jsr305" % "1.3.9"