<!DOCTYPE html>
<html lang="en">
<head>	
<?php require_once('./connection.php');?>
	<meta charset="UTF-8">
  <link rel="stylesheet" href="css/all.css" />
	<title>發布系統</title>
</head>

<body>
  <div class="wrap">
  <form action="admin.php" method="post" enctype="multipart/form-data">
    <table class="table">
    <tr>
      <td>物品名稱 </td>
      <td><input type="text" name="itemname" /></td></tr>
    <tr>
      <td>描述 </td>
      <td><input type="text" name="describe" /></td></tr>
    <tr>
      <td>上傳照片</td>
      <td><input id="file" name="file" type="file"></td></tr>
    <tr>
      <td>遺失時間</td>
      <td><input type="date" name="date" /></td></tr>
    <tr>
      <td>已領/未領</td>
      <td><select name="iftaken">
	           <option value="1">已領</option>
	           <option value="0">未領</option></select></td></tr>
    <tr>
      <td>password</td>
      <td><input type="password" name="password"></td></tr>
    </table><br>
  <input id="submit" name="submit" type="submit" value="開始上傳">
</form><br>
<div class="link">
<table class="table">
 <tr>
  <td style="padding:12px;"><a href="./index.php"> 回首頁 </a><br></td>
  <td style="padding:12px;"><a href="./update.php">更新遺失物品狀態 </a> <br></td>
  <td style="padding:12px;"><a href="./delete.php"> 進入刪除物品頁面 </a><br></td>
  </tr>
</table>
</div>
</div>
</body>
</html>

<?php 
	if(($_POST['password']=='rateadd')&&isset($_POST["itemname"])&&isset($_POST["describe"])&&isset($_POST["iftaken"]))
{
move_uploaded_file($_FILES['file']['tmp_name'],'file/'.$_FILES['file']['name']);//複製檔案
echo '<a href="file/'.$_FILES['file']['name'].'">file/'.$_FILES['file']['name'].'</a>';//顯示檔案路徑



$itemname = $_POST["itemname"];

$describe =	$_POST["describe"];
$image="http://140.127.218.250:49002/file/".$_FILES['file']['name'];
$date =	$_POST["date"];
$iftaken =	$_POST["iftaken"];

$sql = "insert into itemlog(itemname,describe1,image,date,iftaken) values('$itemname','$describe','$image','$date','$iftaken')";

mysqli_query($conn,$sql);


}



 ?>