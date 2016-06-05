<?php
  if($_SESSION['stu_id'] == null)
{
  echo '<meta http-equiv=REFRESH CONTENT=0;url=enter.php>';
  echo "<script>alert('您無權限觀看此頁面!');</script>"; 
}
?>

<?php session_start(); ?>

<html lang="en">
<head>  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="UTF-8">
<?php require("connection.php");?>
  <link rel="stylesheet" href="css/all.css" />
  <title>發布系統</title>
</head>
<body>
  <div class="wrap">
  <?php
  echo "歡迎回來-".$_SESSION['stu_name']."<br>";
  ?>
  <form action="announce_finish.php" method="post" enctype="multipart/form-data">
    <table class="table">
    <tr>
      <td>物品名稱 </td>
      <td><input type="text" name="itemname" 99/></td></tr>
    <tr>
      <td>描述 </td>
      <td><input type="text" name="describe" maxlength="99"/></td></tr>
    <tr>
      <td>上傳照片</td>

      <td><input type="hidden" name="MAX_FILE_SIZE" value="99999999">
      <input name="image" type="file"></td></tr>

    <tr>
      <td>遺失/撿獲時間</td>
      <td><input type="date" name="idate" /></td></tr>
    <tr>
      <td rowspan="1">遺失/撿獲地點</td>
      <td><select name="location">
          <option value="系辦">系辦</option>
          <option value="212" selected="true">212</option>   
       </select></td></tr>
       <br>
    <tr>
      <td>已領/未領</td>
      <td><select name="iftaken" >
             <option value="0">未領</option>
             <option value="1">已領</option>
             </select></td></tr>
    <tr>
      <td rowspan="2">遺失或撿獲</td>
      <td>
        <select name="loseorfinder">
          <option value="1" selected="true">我撿到東西</option>
          <option value="0">我東西掉了</option>
       </select></td> </tr>

    </table><br>
  <input id="submit" name="submit" type="submit" value="開始上傳">
</form><br>
<div class="link">
<table class="table">
 <tr>
  <td style="padding:12px;"><a href="./inventory.php"> 更新或刪除物品 </a><br></td>
  <td style="padding:12px;"><a href="./logout.php"> 登出系統 </a><br></td>
  </tr>
</table>
</div>

<div class="fixed"><a href="./index.php">首頁</a></div>

</div>

</body>
</html>
