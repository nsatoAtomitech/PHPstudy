<?php
if (isset ( $_POST ["regist"] )) {
	// 登録の処理を開始する
	
	// 入力チェック
	
	$error_message = array ();
	
	if ($_POST ["year"] > 2000 and isset ( $_POST ["year"] ) and  is_numeric ( $_POST ["year"] )) {
		$year = $_POST ["year"];
	} else {
		$error_message [] = "年を正しく入力してください。<br>";
	}
	
	if ($_POST ["month"] < 12 and isset ( $_POST ["month"] ) and  is_numeric ( $_POST ["month"] )) {
		$month = $_POST ["month"];
	} else {
		$error_message [] = "月を正しく入力してください。<br>";
		
	}
	
	if ($_POST ["day"] < 31 and isset ( $_POST ["day"] ) and is_numeric ( $_POST ["day"] )){
		$day = $_POST [ "day" ];
	} else {
		$error_message [] = "日付を正しく入力してください。<br>";
	}
	if (isset($_POST["title"]) && $_POST["title"]) {
		if (strstr($_POST["title"], "|")) {
			$error_message[] = "申し訳ありませんが、タイトルに|文字は使えません。<br>";
		} else {
			$title = $_POST["title"];
		}
	} else {
		$error_message[] = "タイトルを入力してください。<br>";
	}
	if (isset($_POST["body"]) && $_POST["body"]) {
		if (strstr($_POST["body"], "|")) {
			$error_message[] = "申し訳ありませんが、内容に|文字は使えません。<br>";
		} else {
			$body = $_POST["body"];
		}
	} else {
		$error_message[] = "内容を入力してください。<br>";
	}
	
	//ファイルへ登録処理
	if (isset ( $error_message )) {
		$body = str_replace(array("\r\n", "\r", "\n"), "<br>", $body);
		$filename = "C:\\Users\\n.sato\\workspace\\sample.txt";  
    $schedule_date = sprintf("%04d%02d%02d", $year, $month, $day);  
    $line = $schedule_date."|".$title."|".$body."\n";  
    $fp = fopen($filename, "a");  
    fwrite($fp, $line);  
    fclose($fp);  
		// スケジュールリストを表示
		header("Location: http://localhost/phpstudy/schedule/schejule_list.php");
		exit;
	}
}else{
	$_POST["year"]=htmlspecialchars("",ENT_QUOTES);
	$_POST["month"]=htmlspecialchars("",ENT_QUOTES);
	$_POST["day"]=htmlspecialchars("",ENT_QUOTES);
	$_POST["title"]=htmlspecialchars("",ENT_QUOTES);
	$_POST["body"]=htmlspecialchars("",ENT_QUOTES);
}

if (isset ( $error_message )) {
	foreach ( $error_message as $message ) {
		print ($message) ;
	}
}
?>

<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja"> 
<head> 
<title>スケジュール登録</title> 
<style type="text/css"> 
  h1 {color: #666666; font-size: 1.3em; font-weight: bold; 
border-left: 10px solid #99CC99; border-bottom: 2px solid #99CC99;} 
  form {color: #333333; background-color: #FFFFFF;} 
  label {font-weight: bold; color: #333333;  
background-color: transparent;} 
  input, textarea {border: none; color: #333333;  
background-color: #FFFFFF;} 
  #schedule-year {width: 3em; border-bottom: 1px solid #000000;} 
  #schedule-month {width: 2em; border-bottom: 1px solid #000000;} 
  #schedule-day {width: 2em; border-bottom: 1px solid #000000;} 
  #label-year, #label-month, #label-day {margin-right: 5px;} 
  #schedule-title {margin-bottom: 10px; width: 20em;  
border-bottom: 1px solid #000000;} 
  #schedule-body {width: 20em; height: 15em; 
  border: 1px solid #000000;} 
  #regist {font-weight: bold; padding: 3px; 
  border-top: 3px double 
  #CCCCCC; border-right: 3px double #333333;    
border-bottom: 3px double 
  #333333; border-left: 3px double #CCCCCC; color: #333333; 
background-color: #EDECEC;} 
  #error-message {font-weight: bold; color: #DD5757; 
ba　ckground-color: transparent;} 
  #error-message li {list-style: circle; line-height: 1.5;} 
</style> 
</head> 
<body> 
<h1>スケジュール登録</h1> 

<?php 
// エラーメッセージを出力する    
if (isset($error_message)) {    
	$body = str_replace(array("\r\n", "\r", "\n"), "<br>", $body);
    print("<div id=\"error-message\"><ul>"); 
    foreach ($error_message as $message) {    
        print("<li>".$message."</li>");   
    }    
    print("</ul></div>"); 
}   
?>
<form action="schejule.php" method="post"> 
  <input type="text" name="year" id="schedule-year" value="<?php print(htmlspecialchars($_POST["year"], ENT_QUOTES)); ?>"/> 
  <label for="schedule-year" id="label-year">年</label> 
  <input type="text" name="month" id="schedule-month" value="<?php print(htmlspecialchars($_POST["month"], ENT_QUOTES)); ?>"/> 
  <label for="schedule-month"  id="label-month">月</label> 
  <input type="text" name="day" id="schedule-day" value="<?php print(htmlspecialchars($_POST["day"], ENT_QUOTES)); ?>"/> 
  <label for="schedule-day" id="label-day">日</label> 
  <dl> 
    <dt><label for="schedule-title"  id="label-title">タイトル</label></dt> 
    <dd><input type="text" name="title" id="schedule-title" value="<?php print(htmlspecialchars($_POST["title"], ENT_QUOTES)); ?>"/></dd> 
    <dt><label for="schedule-body" id="labe-body">内容</label></dt> 
    <dd><textarea name="body" id="schedule-body"><?php print(htmlspecialchars($_POST["body"], ENT_QUOTES)); ?></textarea></dd> 
  </dl> 
  <input type="submit" name="regist" id="regist" value="登録する" onclick="this.disabled = true;"/> 
</form> 

</body> 
</html>
</html>