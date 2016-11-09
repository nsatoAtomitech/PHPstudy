<?php
$filename = "C:\\Users\\n.sato\\workspace\\sample.txt";
$schedule_list = file ( $filename,FILE_IGNORE_NEW_LINES | FILE_USE_INCLUDE_PATH);
echo "<pre>";
print_r($schedule_list);
echo"<pre>";
foreach ( $schedule_list as $lineno => $line ) {
	list ( $schedule_date, $title, $body ) = explode ( "|", $line );
	print ("日付：$schedule_date タイトル：$title 内容：$body") ;
	print ("<a href=\"schejule.php?lineno=$lineno\">
				編集する</a>") ;
	print ("<br>") ;
}
?>