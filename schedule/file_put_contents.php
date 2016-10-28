<?php
$filename = "C:\\Users\\n.sato\\workspace\\samplefile.txt";
$string = "あいうえおabcde亜位卯絵尾あα";
$fp = fopen ( $filename, "w" );
fwrite ( $fp, $string );
fclose ( $fp );
?>