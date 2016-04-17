<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/all.css" />
	<title>212遺失物公告系統</title>
</head>
<body>
<div class="wrap">
 	<span class="welcome">Welcome to 212 Lost and Taken system</span> 
   <br><br><br><br><br><br><br>
	<div class="enter">
		<a href="./home.php"> 點我進入公告欄</a> <br>
		<a href="./enter.php"> 登入系統 </a> <br>
	</div>
</div>
	<h2><center>
	<?php
		echo "現在時間";
		$nowTime = new DateTime("now",new DateTimeZone('Asia/Taipei'));
		echo $nowTime->format("Y年m月d日h點i分");
		echo "<br>";
		header('refresh:60');//每分鐘更新

		//瀏覽人數

	?>
	<h2></center>
</body>
</html>
