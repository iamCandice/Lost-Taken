<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">

<?php 
require("connection.php");
if($_SESSION['stu_id'] == null)
{
  echo "<script>alert('您無權限觀看此頁面!');</script>";
    echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';
}
 ?>

 <?php 
if ($_SESSION['stu_id'] != null) 
{
  if ($_POST["itemname"] !=null && $_POST["describe"]!=null) //以防描述太少
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
      //echo '<a href="file/'.$_FILES['image']['name'].'">file/'.$_FILES['image']['name'].'</a>';//顯示檔案路徑
      }

  //上傳資料
    $itemname = $_POST["itemname"];
    $describe = $_POST["describe"];
    $image="http://140.127.218.250:49002/file/".$_FILES['image']['name'];
    $idate = $_POST["idate"];
    $location = $_POST["location"];
    $iftaken =  $_POST["iftaken"];
    $loseorfinder = $_POST["loseorfinder"];
   // $idate->format("Y年m月d日");
    if($loseorfinder==1)
    {
      $finder = $_SESSION['stu_id'];
    }
    else
    {
      $belongwho = $_SESSION['stu_id'];
    }

    $sql = "insert into itemlog(itemname,describe1,image,idate,location,iftaken,loseorfinder,finder,belongwho) values('$itemname','$describe','$image','$idate','$location','$iftaken','$loseorfinder','$finder','$belongwho')";
    mysqli_query($conn,$sql);

    echo "<script>alert('查看上傳後的結果');</script>";
    echo '<meta http-equiv=REFRESH CONTENT=0;url=inventory.php>';//content是時間
  }
  else{
    echo "<script>alert('請填寫資料');</script>";
    echo '<meta http-equiv=REFRESH CONTENT=0;url=announce.php>';
  }
}

 ?>
