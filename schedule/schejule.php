<?php
if (isset ( $_POST ["regist"] )) {
	// 登録の処理を開始する
	
	// 入力チェック
	
	$error_message = array ();
	
	if ($_POST ["year"] > 2000 or isset ( $_POST ["year"] ) or  is_numeric ( $_POST ["year"] )) {
		$year = $_POST ["year"];
	} else {
		$error_message [] = "年を正しく入力してください。";
		print($error_message[0]);
	}
	
	if ($_POST ["month"] < 12 or isset ( $_POST ["month"] ) or  is_numeric ( $_POST ["month"] )) {
		$month = $_POST ["month"];
	} else {
		$error_message [] = "月を正しく入力してください。";
	}
	
	if ($_POST ["day"] < 31 or isset ( $_POST ["day"] ) or is_numeric ( $_POST ["day"] )){
		$day = $_POST [ "day" ];
	} else {
		$error_message [] = "日付を正しく入力してください。";
	}
	if (isset ( $_POST ["title"] )) {
		if (strpos ( $_POST ["title"], "|" )== false) {
			$title = $_POST ["title"];
		} else {
			echo "タイトルの中に　|　は使えません。";
		}
	} else {
		$error_message [] = "タイトルを入力してください。";
	}
	if (isset ( $_POST ["body"] )) {
		if (strpos ( $_POST ["body"], "|" ) == false) {
			$body = $_POST ["body"];
		} else {
			echo "内容に | は使えません。";
		}
	} else {
		$error_message [] = "内容を入力してください。";
	}
	
	//ファイルへ登録処理
	if (isset ( $error_message )) {
		$schejule_date = sprintf ("日付：%04d%02d%02d", $year, $month, $day );
		$line = $schejule_date . "|" . $title . "|" . $body . "\n";
		$file_name = "C:\\Users\\n.sato\\workspace\\samplefile.txt";
		$fp = fopen ( $file_name, "a" );
		fwrite ( $fp, $line );
		fclose ( $fp );
		// スケジュールリストを表示
		header("Location:http://localhost/PHPstudy/schedule/schejule_list.php");
		exit;
	}
}

if (isset ( $error_message )) {
	foreach ( $error_message as $message ) {
		print ($message) ;
	}
}
?>
<html>
<body>
	スケジュールを登録してください:
	<form action="schejule.php" method="post">
		<input type="text" name="year"> 年 <input type="text" name="month"> 月 <input
			type="text" name="day"> 日 <br> <br> タイトル： <input type="text" name="title">
		<br> 
		<br>内容：
		<textarea name="body"></textarea>
		<input type="submit" name="regist" value="登録"><input type="reset"
			value="リセット">
	</form>
</body>
</html>