<?php
	$filename = "C:\\Users\\n.sato\\workspace\\samplefile.txt";
	$file_list = file($filename);
	foreach($file_list as $line){
		list($schedule_date,$title,$body) = explode("|",$line);
		print ($schedule_date."|" . $title . "|" . $body."\n<br>");
	}
?>