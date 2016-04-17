<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once('./connection.php')
?>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/all.css" />
<title>刪除物品</title>
</head>

<body>
<div class="wrap">
<form action="delete.php" method="post" enctype="multipart/form-data">
  <table class="table">
  <tr>
  	<td>請輸入欲整筆刪除之物品編號</td>
  	<td><input type="text" name="delete_no" /></td></tr>
  <tr>
   	<td>password</td>
    <td><input type="password" name="password" id=""></td></tr>
  </table><br>
  <input id="submit" name="submit" type="submit" value="開始上傳">
  
</form><br>
<table class="table"><tr><td><a href="./index.php"> 點我回首頁 </a></td></tr></table>
</div>
</body>
</html>

<?php 
if(($_POST['password']=='rateadd')&&isset($_POST["delete_no"]))
{
$delete_no = $_POST["delete_no"];
$sql =" DELETE FROM `database`.`itemlog` WHERE `itemlog`.`no` = '$delete_no'";
mysqli_query($conn,$sql);
}





 ?>