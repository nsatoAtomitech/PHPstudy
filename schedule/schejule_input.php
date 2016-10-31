<?php

$str = "phpは面白みに欠ける";
if(strpos($str,"白") !== false){
	echo "文字列は含まれています。<br>";
	echo strpos($str,"白");
}else{
	echo "文字列は含まれていません。";
}


?>