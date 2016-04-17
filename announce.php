<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!DOCTYPE html>

<html lang="en">
<head>  
<?php 
require_once('./connection.php');
if($_SESSION['stu_id'] == null)
{
	echo "<script>alert('您無權限觀看此頁面!');</script>";
    echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';
}
 ?>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/all.css" />
  <title>發布系統</title>
</head>
<body>
  <div class="wrap">
  <?php
  echo "歡迎回來-".$_SESSION['stu_name']."<br>";

  ?>
  <form action="announce.php" method="post" enctype="multipart/form-data">
    <table class="table">
    <tr>
      <td>物品名稱 </td>
      <td><input type="text" name="itemname" /></td></tr>
    <tr>
      <td>描述 </td>
      <td><input type="text" name="describe" /></td></tr>
    <tr>
      <td>上傳照片</td>

      <td><input type="hidden" name="MAX_FILE_SIZE" value="1000000">
      <input name="image" type="file"></td></tr>

    <tr>
      <td>遺失/撿獲時間</td>
      <td><input type="date" name="date" /></td></tr>
    <tr>
      <td rowspan="1">遺失/撿獲地點</td>
      <td><select name="location">
          <option value="系辦">系辦</option>
          <option value="212" selected="true">212</option>
          
       </select></td></tr>
       <br>
    <tr>
      <td>已領/未領</td>
      <td><select name="iftaken" id="">
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
  <td style="padding:12px;"><a href="./delete.php"> 更新或刪除物品 </a><br></td>
  <td style="padding:12px;"><a href="./logout.php"> 登出系統 </a><br></td>
  </tr>
</table>
</div>

<div class="fixed"><a href="./index.php">首頁 </a>
</div>

</div>

</body>
</html>


<?php 
if ($_SESSION['stu_id'] != null) 
{
	if ($_POST["itemname"] !=null && $_POST["describe"]!=null) 
	{

	    if ($_FILES["image"]["error"] > 0)
	    {
	       echo "<script>alert('上傳失敗!');</script>";
	       switch ($_FILES["image"]["error"]){
	           case 1:
	             echo "<script>alert('失敗原因：大小超過php.ini內設定 upload_max_filesize');</script>";
	             break;
	           case 2:
	             echo "<script>alert('失敗原因：大小超過表單設定 MAX_FILE_SIZE');</script>";
	             break;
	           case 3:
	             echo "<script>alert('失敗原因：上傳不完整');</script>";
	             break;
	           case 4:
	             echo "<script>alert('失敗原因：沒有檔案上傳');</script>";
	             break;
	           case 6:
	             echo "<script>alert('失敗原因：暫存資料夾不存在');</script>";
	             break;
	           case 7:
	             echo "<script>alert('失敗原因：上傳檔案無法寫入');</script>";
	             break;
	           case 8:
	             echo "<script>alert('失敗原因：上傳停止');</script>";
	             break;    
	           }
	    }
	    else
	    {
	      
	      echo "<script>alert('資料已上傳');</script>";

	      move_uploaded_file($_FILES['image']['tmp_name'],'file/'.$_FILES['image']['name']);//複製檔案
	    echo '<a href="file/'.$_FILES['image']['name'].'">file/'.$_FILES['image']['name'].'</a>';//顯示檔案路徑
	    }

	//上傳資料
	  $itemname = $_POST["itemname"];
	  $describe = $_POST["describe"];
	  $image="http://140.127.218.250:49002/file/".$_FILES['image']['name'];
	  $date = $_POST["date"];
	  $location = $_POST["location"];
	  $iftaken =  $_POST["iftaken"];
	  $loseorfinder = $_POST["loseorfinder"];
	  if($loseorfinder==1)
	  {
	    $finder = $_SESSION['stu_id'];
	  }
	  else
	  {
	    $belongwho = $_SESSION['stu_id'];
	  }

	  $sql = "insert into itemlog(itemname,describe1,image,date,location,iftaken,loseorfinder,finder,belongwho) values('$itemname','$describe','$image','$date','$location','$iftaken','$loseorfinder','$finder','$belongwho')";
	  mysqli_query($conn,$sql);

	  echo "<script>alert('查看上傳後的結果');</script>";
	  echo '<meta http-equiv=REFRESH CONTENT=2;url=delete.php>';
	}
	else{
	  echo "<script>alert('請填寫資料');</script>";
	}
}

 //告知使用者編號、增加：檢視我的發文、增加上傳照片如何上傳jpg的說明
//loseorfinder若是value=1，finder=user。
 ?>

