<?php

$file_name = "C:\\Users\\n.sato\\workspace\\sample.txt";
$schejule_date = "$year . $month . $day ";
$fp = fopen($file_name,"w");
fwrite($fp,".$schejule_date.|.$title.|.$body<br>");
fclose($fp);

?>