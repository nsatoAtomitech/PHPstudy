<?php
if (isset ( $_POST ["regist"] )) {
	// 登録の処理を開始する
	
	// 入力チェック
	$error_message = aray ();
	if ($_post ["year"] > 2000 or isset ( $_POST ["year"] ) or ! is_numeric ( $_POST ["age"] )) {
		$error_message [] = "年を正しく入力してください。";
	} else {
		$year = $_POST ["year"];
	}
	
	if ($_POST ["month"] > 12 or isset ( $_POST ["month"] ) or ! is_numeric ( $_POST ["manth"] )) {
		$error_message [] = "月を正しく入力してください。";
	} else {
		$month = $_POST ["month"];
	}
	
	if ($_POST ["day"] > 31 or isset ( $_POST ["day"] ) or ! is_numeric ( $_POST ["day"] )) {
		$error_message [] = "日付を正しく入力してください。";
	} else {
		$day = $_POST ( "day" );
	}
	if (isset ( $_POST ["title"] )) {
		$title = $_POST ["title"];
	} else {
		$error_message [] = "タイトルを入力してください。";
	}
	if (isset ( $_POST ["body"] )) {
		$body = $_POST ["body"];
	} else {
		$error_message [] = "内容を入力してください。";
	}
	
	if (isset ( $error_message )) {
		// ファイル登録処理
		// 登録後の処理をどうするか
	}
}

if (isset ( $error_message )) {
	foreach ( $error_message as $message ) {
		print ($message) ;
	}
}
?>

<body>
	スケジュールを登録してください:
	<form action="schejule.php" method="post">
		<input type="text" name="year"> 年 <input type="text" name="month"> 月 <input
			type="text" name="day"> 日 <br> タイトル： <input type="text" name="title">
		<br> 内容：
		<textarea name="body"></textarea>
		<input type="submit" name="regist" value="登録"><input type="reset"
			value="リセット">
	</form>
</body>