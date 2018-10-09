<?php
function sparkjs_insert($id, $title, $author, $file, $time, $category){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://s4514040.uqcloud.net/jobs?appName=crud&classPath=spark.jobserver.CreateDB");
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, 'data.input = '.$id.'","'.$title.'","'.$author.'","'.$file.'","'.$time.'","'.$category);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($curl);
	curl_close($curl); 
}

function sparkjs_update_likes($id, $title, $author, $file, $time, $likes, $category){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://s4514040.uqcloud.net/jobs?appName=crud&classPath=spark.jobserver.UpdateDB");
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, 'data.input = '.$id.'","'.$title.'","'.$author.'","'.$file.'","'.$time.'","'.$likes.'","'.$category);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($curl);
	curl_close($curl);
}

function sparkjs_read($amount="all"){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://s4514040.uqcloud.net/jobs?appName=crud&classPath=spark.jobserver.ReadDB");
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, 'data.input = '.$amount);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($curl);
	curl_close($curl);
	$output = json_decode($output);
	$job_id = $output->{'result'}->{'jobId'};
	sleep(1);
	
	while (true){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "http://s4514040.uqcloud.net/jobs/".$job_id);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		$output = json_decode($output);
		if ($output->{'duration'} != "Job not done yet"){
			break;
		}
		sleep(1);
	}
	$result = $output->{'result'};
	if ($result == "()"){
		$result = array();
		return $result;
	} else {
		$result = clean_result($output->{'result'});
		return $result;
	}
}

function clean_result($r_array){
	$helper_array = array("category", "title", "id", "author", "file", "likes", "time");
	$result = array();
	foreach($r_array as $value){
		$temp_array = array("id" => "", "title" => "", "author" => "", "file" => "", "time" => "", "likes" => "", "category" => "");
		$value = substr($value,13);
		$value = substr($value,0,-1);
		$value = explode(",",$value);
		for($x=0;$x<7;$x++){
			$pos = strpos($value[$x],": ") + 2 ;
			$value[$x] = substr($value[$x],$pos);
			$temp_array[$helper_array[$x]] = $value[$x]; 
		}
		array_push($result, $temp_array);
	}
	
	return $result;
}

function sparkjs_delete($category, $title, $id){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://s4514040.uqcloud.net/jobs?appName=crud&classPath=spark.jobserver.DeleteDB");
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, 'data.input = '.$category.'","'.$title.'","'.$id);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($curl);
	curl_close($curl);
}

//UUID Function Credit to http://www.seanbehan.com/how-to-generate-a-uuid-in-php
function uuid(){
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function sparkjs_avglikes (){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://s4514040.uqcloud.net/jobs?appName=crud&classPath=spark.jobserver.AvgLikes");
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, 'data.input = GO');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($curl);
	curl_close($curl);
	$output = json_decode($output);
	$job_id = $output->{'result'}->{'jobId'};
	sleep(1);
	
	while (true){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "http://s4514040.uqcloud.net/jobs/".$job_id);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		$output = json_decode($output);
		if ($output->{'duration'} != "Job not done yet"){
			break;
		}
		sleep(1);
	}
	$result = $output->{'result'};
	$result = number_format($result, 2);
	return $result;
}

//Example Usage
//sparkjs_insert("c9f3c9f2-bacf-476b-b959-3e69a674d2d5", "A Master Piece", "Bean", "aws", "2018-12-28", "Doodle");
//sparkjs_update_likes("c9f3c9f2-bacf-476b-b959-3e69a674d2d5", "A Master Piece", "Bean", "aws", "2018-12-28", "3", "Doodle");
//sparkjs_delete("Doodle","A Master Piece","c9f3c9f2-bacf-476b-b959-3e69a674d2d5");
//sparkjs_read();
//sparkjs_avglikes();
?> 