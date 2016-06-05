<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!DOCTYPE html>

<html lang="en">
<head>  
<?php 
require("connection.php");
 ?>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/all.css" />
  <title>發布系統</title>
</head>
<body>
  <div class="wrap">
<?php

	$id = $_GET["id"];

	$del = "DELETE FROM itemlog WHERE no =".$id;
    if(mysqli_query($conn, $del)){
    	 echo "<script>alert('資料已刪除');</script>";
    }

	$read="SELECT * FROM itemlog";
	$readresult=mysqli_query($conn,$read);

	echo "<table border='1'>";
	echo "<tr><td>編號</td><td>物品名稱</td><td>物品描述</td><td>照片</td><td>遺失/撿獲時間</td><td>遺失/撿獲地點</td><td>已領/未領</td><td>遺失或撿獲</td></tr>";
	while ($result=mysqli_fetch_array($readresult)) 
	{	
		if($result[8] == $_SESSION['stu_id'] || $result[9] == $_SESSION['stu_id'])
		//belongwho、finder只顯示跟自己有關的
		{
			echo "<tr>";
			echo "<td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td><img src=".$result[3]." alt='imgageid' height='150' width='150'></td><td>".$result[4]."</td><td>".$result[5]."</td>";
			if($result[6] == 1){
				echo "<td>已領</td>";
			}
			else{
				echo "<td>未領</td>";
			}
			if ($result[7] == 1){
				echo "<td>我撿到東西</td>";
			}
			else{
				echo "<td>我東西掉了</td>";
			}
			
			echo "<td><a href='update.php?id=".$result[0]."'>更新資料</a></td>";
			echo "<td><a href='inventory.php?id=".$result[0]."'>刪除資料</a></td>";
			echo "</tr>";
		}
	
	}
	echo "</table>";
?>

<div class="fixed"><a href="./announce.php">上頁 </a>
</div>

</div>

 </body>
</html>
