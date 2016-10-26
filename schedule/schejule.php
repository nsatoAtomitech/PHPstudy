<?php
	if (isset($_POST["regist"])) {
		// 登録の処理を開始する
		
		//入力チェック
		$error_message = aray();
		if($_post["year"] > 2000 or isset($_POST["year"]) or !is_numeric($_POST["age"])){
			$error_message[] = "年を正しく入力してください。";
		}else{
			$year = $_POST["year"];
		}
		
		if($_POST["month"] > 12 or isset($_POST["month"]) or !is_numeric($_POST["manth"])){
			$error_message[] = "月を正しく入力してください。";
		}else{ 
			$month = $_POST["month"];
		}
		
		if($_POST["day"] > 31 or isset($_POST["day"]) or !is_numeric($_POST["day"])){
			$error_message[] = "日付を正しく入力してください。";
		} else {	
				$day = $_POST("day");
		}
		if (isset($_POST["title"]) && $_POST["title"]) {
			$title = $_POST["title"];
		} else {
			$error_message[] = "タイトルを入力してください。";
		}
		if (isset($_POST["body"]) && $_POST["body"]) {
			$body = $_POST["body"];
		} else {
			$error_message[] = "内容を入力してください。";
		}
		if(isset($error_message)){
			
		}
		
			
	}
?>