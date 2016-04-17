<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!DOCTYPE html>

<html lang="en">
<head>  
<?php 
require_once('./connection.php');
 ?>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/all.css" />
  <title>發布系統</title>
</head>
<body>
  <div class="wrap">
<?php

$id = $_GET["id"];

	$del = "DELETE FROM itemlog WHERE no=".$id;
	mysqli_query($conn, $del);


	$read="SELECT * FROM itemlog";
	$readresult=mysqli_query($conn,$read);

	echo "<table border='1'>";
	echo "<tr><td>編號</td><td>物品名稱</td><td>物品描述</td><td>照片</td><td>遺失/撿獲時間</td><td>遺失/撿獲地點</td><td>已領/未領</td><td>遺失或撿獲</td></tr>";
	while ($result=mysqli_fetch_array($readresult)) 
	{
		echo "<tr>";
		echo "<td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td><img src=".$result[3]." alt='imgageid' height='300' width='300'></td><td>".$result[4]."</td><td>".$result[5]."</td><td>".$result[6]."</td><td>".$result[7]."</td>";
		echo "<td><a href='update.php?id=".$result[0]."'>更新資料</a></td>";
		echo "<td><a href='delete.php?id=".$result[0]."'>刪除資料</a></td>";
		echo "</tr>";
	}
	echo "</table>";

?>

<div class="fixed"><a href="./index.php">首頁 </a>
</div>

</div>

 </body>
</html>