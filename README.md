# LULZCLOUD
A Project by: 
- Abdullah, 
- Alvin, 
- Marcus, 
- Sze Yan, 
- You Chen

 TABLE OF CONTENT
=======================================================================
* [LULZCLOUD](#lulzcloud)
    * [Setting Up Cassandra](#setting-up-cassandra)
    * [PHPCass (If without Spark Job Server and directly called from Cassandra)](#phpcass-if-without-spark-job-server-and-directly-called-from-cassandra)
    * [Setting up Spark Job Server (RESTFUL Web API)](#setting-up-spark-job-server-restful-web-api)
        * [Setting Up Master](#master)
        * [Setting Up Slave](#slave)
        * [Setting up Ngix](#nginx-configuration-with-spark-job-server-container)
        * [Usage on Spark jobserver](#usage-on-spark-jobserver)
	* [Nginx Load Balancer]
    

## Setting up Cassandra
### Setup and Create Environment
```bash
sdc-setup
```
```bash
eval "$(triton env --docker env)
```

### Pull Cassandra Image into Docker
```bash
docker pull cassandra:3.11.1
```

### Run Cass1
```bash
docker run -d --network zones --name cass1 cassandra:3.11.1
```

### Turn off Cass 1 Firewall
```bash
triton instance disable-firewall cass1
```

### Retrieve Cass 1 IP Address
```bash
 seed=$(docker inspect -f '{{ .NetworkSettings.IPAddress }}' cass1)
 ``` 
```bash
echo $seed
```

### Run Cass2
```bash
docker run -d --network zones --name cass2 cassandra:3.11.1
```

### Turn off Cass2 Firewall
```bash
triton instance disable-firewall cass2
```

### Retrieve Cass 2 IP Address
```bash
seed1=$(docker inspect -f '{{ .NetworkSettings.IPAddress }}' cass2) 
```
```bash
echo $seed1
```

### CQLSH
```bash
docker run -it --rm --network zones cassandra:3.11.1 cqlsh $seed
```

### Check Clusters
```sql
SELECT peer, data_center from system.peers;
```

### Create Keyspace
```sql 
Use cloudcomputing
```

### Create tables
```sql
CREATE TABLE meme(
id uuid, 
file text, 
title text, 
author text, 
category text, 
time date, 
likes int, 
PRIMARY KEY ((category,title,id))
) ;
```
### Exit CQLSH
```bash 
exit
```

## PHPCass (If without Spark Job Server and directly called from Cassandra)
### Pull PHPCass Image to Docker
```bash
docker pull oonlyo/phpcass
```

### Run PHPCass
```bash
docker run -d --name phpcass -e SSH_PASSWORD=password oonlyo/phpcass 
```

### Disabled PHPCass firewall
```bash
triton instance disable-firewall phpcass
```

### Enter PHPCass Shell
```bash
triton instance disable-firewall phpcass
```

### Setting up Spark Job Server (RESTFUL Web API)
 
 ### Pull Spark Job Server from Docker 
 ```bash
 docker pull velvia/spark-jobserver:0.6.2.mesos-0.28.1.spark-1.6.1
 ```
 ### Master
 #### Step 1 - Run Spark Job Server on docker
 ```bash
 docker run -d --network zones --label com.joyent.package=large --name spark_master_1 -e SPARK_TYPE="master" velvia/spark-jobserver:0.6.2.mesos-0.28.1.spark-1.6.1
 ```
 
 #### Step 2 - Execute docker
 ```bash
 docker exec -ti <container name> /bin/bash
 ```
 
 #### Step 3 - Run and update apt 
 ```bash
 run apt update and apt upgrade
 ```
 
 #### Step 4 - Download jsr166e-1.1.0.jar
 ```bash
 http://central.maven.org/maven2/com/twitter/jsr166e/1.1.0/jsr166e-1.1.0.jar
 ```
 
 #### Step 5 - Download spark-cassandra-connector-1.6.12-s_2.10.jar
 ```bash
 http://dl.bintray.com/spark-packages/maven/datastax/spark-cassandra-connector/1.6.12-s_2.10/spark-cassandra-connector-1.6.12-s_2.10.jar
 ```
 #### Step 6 
 ```bash
 Move all the downloaded files into /app folder
 ```
 
 
 #### Step 7 Change directory to /app folder 
 ```bash
 go to /app folder
 ```
 #### Step 8 Start Spark Job Server
 ```bash
 open server_start.sh with text editor
 ```
 #### Step 9 Find lines
 ```bash
 ./spark/sbin/start-master.sh
 ```
 #### Step 10 Change the following section in server_start.sh:
 ```bash
 cmd='$SPARK_HOME/bin/spark-submit --class $MAIN --driver-memory $JOBSERVER_MEMORY
   --conf "spark.executor.extraJavaOptions=$LOGGING_OPTS"
   --driver-java-options "$GC_OPTS $JAVA_OPTS $LOGGING_OPTS $CONFIG_OVERRIDES"
   $@ $appdir/spark-job-server.jar $conffile'
 
   
 to
 
 cmd='$SPARK_HOME/bin/spark-submit --class $MAIN --master spark://*.*.*.*:7077 --driver-memory $JOBSERVER_MEMORY
   --conf "spark.executor.extraJavaOptions=$LOGGING_OPTS"
   --driver-java-options "$GC_OPTS $JAVA_OPTS $LOGGING_OPTS $CONFIG_OVERRIDES"
   --jars $appdir/jsr166e-1.1.0.jar,$appdir/spark-cassandra-connector-1.6.12-s_2.10.jar $appdir/spark-job-server.jar $conffile'
 
 This change will link spark job server with spark cassandra connector and spark master
 
 ```
 #### Step 11 Open docker.conf file with text editor and change the following section:
 ```bash
 context-settings {
     num-cpu-cores = 2           # Number of cores to allocate.  Required.
     memory-per-node = 512m         # Executor memory per node, -Xmx style eg 512m, #1G, etc.
 
     # in case spark distribution should be accessed from HDFS (as opposed to being installed on every mesos slave)
     # spark.executor.uri = "hdfs://namenode:8020/apps/spark/spark.tgz"
 
     # uris of jars to be loaded into the classpath for this context. Uris is a string list, or a string separated by commas ','
     # dependent-jar-uris = ["file:///some/path/present/in/each/mesos/slave/somepackage.jar"]
 
     # If you wish to pass any settings directly to the sparkConf as-is, add them here in passthrough,
     # such as hadoop connection settings that don't use the "spark." prefix
     passthrough {
       #es.nodes = "192.1.1.1"
     }
 
 to
 
   context-settings {
     num-cpu-cores = 2           # Number of cores to allocate.  Required.
     memory-per-node = 512m         # Executor memory per node, -Xmx style eg 512m, #1G, etc.
 
     # in case spark distribution should be accessed from HDFS (as opposed to being installed on every mesos slave)
     # spark.executor.uri = "hdfs://namenode:8020/apps/spark/spark.tgz"
 
     spark.cassandra.connection.host = <cassandra host ip address>
 
     # uris of jars to be loaded into the classpath for this context. Uris is a string list, or a string separated by commas ','
     # dependent-jar-uris = ["file:///some/path/present/in/each/mesos/slave/somepackage.jar"]
 
     # If you wish to pass any settings directly to the sparkConf as-is, add them here in passthrough,
     # such as hadoop connection settings that don't use the "spark." prefix
     passthrough {
       #es.nodes = "192.1.1.1"
     }
 ```
 
 
 #### Step 12 
 ```bash
 SAVE THE CHANGES AND RESTART CONTAINER
 ```
 
 
 
 ### Slave
 
 #### Step 1
 ```bash
 docker run -d --network zones --label com.joyent.package=huge --name spark_slave_1 -e SPARK_WORKER_CORES=2 velvia/spark-jobserver:0.6.2.mesos-0.28.1.spark-1.6.1
 ```
 
 #### Step 2
 ```bash
 docker exec -ti <container name> /bin/bash
 ```
 
 
 
 #### Step 3
 ```bash
 run apt update and apt upgrade
 ```
 
 
 
 #### Step 4 add the following command on the beginning of /app/server_start.sh file:
 ```bash
 ./spark/sbin/start-slave spark://<spark_master_1 ip address>:7077,<spark_master_2 ip address>:7077
 ```
 
 ### Step 5 
 ```bash
 Save changes and restart the container
 ```
 
 ## Nginx configuration with spark job server container:
 ### Step 1 Run Docker
 ```bash
 docker run -d --network zones --label com.joyent.package=large --name spark_master_1 -e SPARK_TYPE="master" velvia/spark-jobserver:0.6.2.mesos-0.28.1.spark-1.6.1
 ```
 ### Step 2 Execute docker
 ```bash
 docker exec -ti <container name> /bin/bash
 ```
 
 ### Step 3 Run Apt Update and Apt Upgrade
 ```bash
 run apt update and apt upgrade
 ```
 
 ### Step 4 Run Apt install ngix
 ```bash
 run apt install nginx
 ```
 
 ### Step 5
 ```bash
 remove 
 /etc/nginx/sites-enabled/default
 ```
 
 ### Step 6
 ```bash
 go to
 /etc/nginx/conf.d/
 ```
 
 ### Step 7
 ```bash
 nano load-balancer.conf
 ```
 
 ### Step 8 Write the following config:
 ```bash
 upstream spark {
    server <spark_master_1 ip address:8090> ; 
    server <spark_master_2 ip address:8090>;
 }
 
 server {
    listen 80; 
 
    location / {
       proxy_pass http://spark;
    }
 }
 
 ```
 ### Step 10
 ```
 save the config and restart nginx service 
 ```
 
 ##  Usage on Spark Jobserver
 ### Step 1 : Deploy App (in our case is something to do with crud operation in the database, the source code can be accessed inside github crud package folder)
 ```bash
 curl -X POST --data-binary @app.jar http://s4511454.uqcloud.net/jars/<name-of-the-app>
 ```
 
 ### Step 2: Create persistent context (Do this inside spark jobserver master container)
 ```bash
 curl -X POST "localhost:8090/contexts/meme-context?num-cpu-cores=2&mem-per-node=1G"
 ```
 ### Example crud Application Usage on Spark Job Server:
 #### A. Insert Data into Cassandra
 ```bash
 curl -X POST "data.input = <id>, <title>, <author>, <file>, <time>, <category>" "http://s4511454.uqcloud.net/jobs?appName=crud&classPath=spark.jobserver.CreateDB&context=meme-context&sync=true"
 ```
 
 #### B. Update Data into Cassandra
 ```bash
 curl -X POST "data.input = <id>, <title>, <author>, <file>, <time>, <likes>, <category>" "http://s4511454.uqcloud.net/jobs?appName=crud&classPath=spark.jobserver.UpdateDB&context=meme-context&sync=true"
 
 ```
 
 #### C. Delete Data into Cassandra
 ```bash
 curl -X POST "data.input = <category>, <title>, <id>" "http://s4511454.uqcloud.net/jobs?appName=crud&classPath=spark.jobserver.DeleteDB&context=meme-context&sync=true"
 
 ```
 
 #### D. Read Data from Cassandra
 ```bash
 Based on category:
 
 curl -X POST "data.input = <category>" "http://s4511454.uqcloud.net/jobs?appName=crud&classPath=spark.jobserver.ReadDB&context=meme-context&sync=true"
 
 Take All:
 
 curl -X POST "data.input = all" "http://s4511454.uqcloud.net/jobs?appName=crud&classPath=spark.jobserver.ReadDB&context=meme-context&sync=true"
 ```
 
 #### E. Find average likes from cassandra using aggragate function in spark
 ```bash
 curl -X POST "data.input = GO" ""http://s4511454.uqcloud.net/jobs?appName=crud&classPath=spark.jobserver.AvgLikes&context=meme-context&sync=true""
 ```
 
 ##Nginx Load Balancer
 ###We are using Nginx load balancer to achieve SparkJobServer High Availability by using Round-Robin Method