<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!DOCTYPE html>

<html lang="en">
<head>  
<?php 
include("connection.php");
 ?>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/all.css" />
  <title>發布系統</title>
</head>
<body>
  <div class="wrap">
  <form action="announce.php" method="post" enctype="multipart/form-data">
  <h1>發布系統</h1>
  請務必填寫所有資料
  <br>
    <table class="table">
    <tr>
      <td>物品名稱 </td>
      <td><input type="text" name="itemname" /></td></tr>
    <tr>
      <td>描述 </td>
      <td><input type="text" name="describe1" /></td></tr>
    <tr>
      <td>上傳照片</td>

      <td>
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
  <td style="padding:12px;"><a href="./update.php">更新物品狀態 </a> <br></td>
  <td style="padding:12px;"><a href="./delete.php"> 刪除物品 </a><br></td>
  </tr>
</table>
</div>

<div class="fixed"><a href="./index.php">首頁 </a>
</div>

</div>



<?php 

if(isset($_POST["itemname"])&&isset($_POST["describe1"]))
{
  include("errorreport.php");
 $uploaddir="./file/";
 $tmpfile=$_FILES["image"]["tmp_name"];
 $file2=mb_convert_encoding($_FILES["image"]["name"],"big5","UTF-8");
 $blacklist = array(".php", ".phtml", ".php3", ".php4", ".php5", ".exe", ".js",".html", ".htm", ".inc");
 $allowed_filetypes = array('.jpg','.gif','.bmp','.png');
 if (isset($_FILES['image'])) 
  {
  if ($_FILES['image']['error'] != 0) 
   {
    //1~8為FILES陣列的錯誤代碼
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
         break;    }
  errorreport($_FILES['image']['error']);
   } 
  else 
    {
      foreach ($blacklist as $item) 
      {
        if (preg_match("/$item$/i", $_FILES['image']['name'])) 
          {
            echo "不合法檔案類型!";
           unset($_FILES['image']['tmp_name']);
           exit; 
          }
      }
  $ext = substr($_FILES['image']['name'], strpos($_FILES['image']['name'],'.'), strlen($_FILES['image']['name'])-1);
  if(!in_array($ext,$allowed_filetypes))
    {
      die('上傳的檔案沒有列在允許上傳清單內');
    }
  if (is_uploaded_file($_FILES['image']['tmp_name'])) 
    {
      if(move_uploaded_file($tmpfile,$uploaddir.$file2)) 
        {
          echo "上傳成功！";
        }
      else
        {
          echo "<script>上傳失敗.;</script>";   
          errorreport($_FILES['image']['error']);
          unset($_FILES['image']['tmp_name']);
        }
    }
  else 
    {
      errorreport($_FILES['image']['error']);
    }     
    }
  }
 else 
  { 
  echo "請挑選一個檔案上傳";
  }    


//輸入資料庫
$itemname = $_POST["itemname"];
$describe1 = $_POST["describe1"];
$image="http://140.127.218.250:49002/file/".$_FILES['image']['name'];
$date = $_POST["date"];
$location = $_POST["location"];
$iftaken =  $_POST["iftaken"];
$loseorfinder = $_POST["loseorfinder"];
  
$sql = "insert into itemlog(itemname,describe1,image,date,location,iftaken,loseorfinder) values('$itemname','$describe1','$image','$date','$location','$iftaken',$loseorfinder)";

mysqli_query($conn,$sql);


//告知使用者編號、增加：檢視我的發文、增加上傳照片如何上傳jpg的說明
//loseorfinder若是value=1，finder=user。

/*
//搜尋資料庫資料
  $sql = "SELECT * FROM student where stu_id = '$id'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_row($result);

if($loseorfinder==1){
  $finder = $id;
}
else{
  $belongwho = $id;
}*/

}
 ?>

 </body>
</html>
