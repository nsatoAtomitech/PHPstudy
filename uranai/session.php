<?php
	session_start();
	
	if(isset($_SESSION["counter"])){
		
		$_SESSION["counter"]++;
		printf($_SESSION["counter"]."回目の読み込みです。\n<br>");
		
	}else{
		
		$_SESSION["counter"] = 0 ;
		printf("初めての読み込みです。");
		
	}
?>