<?php
	$filename = "C:\\Users\\n.sato\\workspace\\samplefile.txt";
	
	$schedule_list = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	foreach ($schedule_list as $line ) {
		list($schedule_date, $title, $body) = explode("|",$line);
		print("日付：$schedule_date タイトル：$title <br>内容：$body <br>");
	}
?>