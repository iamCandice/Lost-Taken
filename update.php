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
include("connection.php");

        //將$_SESSION['username']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
        $id = $_SESSION['item'];
        echo "這裡是編號：".$_SESSION['item'];
        //若以下$id直接用$_SESSION['username']將無法使用
        $sql = "SELECT * FROM itemlog where no='$id'";
        mysqli_query($conn, $sql);


        $read="SELECT * FROM itemlog";
        $readresult=mysqli_query($conn,$read);

    while ($result=mysqli_fetch_array($readresult))
        {
                if($result[0] == $_SESSION['item'])
                {
        echo "<form name=\"form\" method=\"post\" action=\"update_finish.php\"enctype=\"multipart/form-data\">";
        echo "<table class='table'>";

        echo "<tr>
                <td>物品名稱：</td><td><input type=\"text\" name=\"itemname\" value=\"$result[1]\" /> <br></td></tr>";
        echo "<tr>
                <td>描述： </td><td><input type=\"text\" name=\"describe\" value=\"$result[2]\" /> <br></td></tr>";
        echo "<tr>
                <td>上傳照片：</td><td><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1000000\"><input type=\"file\" name=\"image\" value=\"$result[3]\" /> <br></td></tr>";
        echo "<tr>
                <td>遺失/撿獲時間：</td><td><input type=\"date\" name=\"date\" value=\"$result[4]\" /> <br></td></tr>";
        echo "<tr>
                <td>遺失/撿獲地點：</td><td><select name=\"location\" ><option value=\"系辦\">系辦 </option><option value=\"212\">212</option></select> <br></td></tr>";
        echo "<tr>
                <td>已領/未領：</td><td><select name=\"iftaken\" id=\"\"><option value=\"0\">未領</option>
                        <option value=\"1\">已領</option>
                        </select> <br></td></tr>";
        echo "<tr>
                <td>遺失或撿獲：</td><td><select name=\"loseorfinder\">
          <option value=\"1\">我撿到東西</option>
          <option value=\"0\">我東西掉了</option>
       </select><br></td></tr>";


        echo "<tr>
                <td><input type=\"submit\" name=\"submit\" value=\"確定\" /></td></tr>";
        echo "</table>";
        echo "</form>";

                }
        }
?>

</div>

<div class="fixed"><a href="./delete.php">上頁 </a>
</div>

</div>

</body>
</html>

<?php
    if ($_FILES["image"]["error"] > 0 && $_FILES["image"]["error"] != 4)
    {
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

      move_uploaded_file($_FILES['image']['tmp_name'],'file/'.$_FILES['image']['name']);//複製檔案
    echo '<a href="file/'.$_FILES['image']['name'].'">file/'.$_FILES['image']['name'].'</a>';//顯示檔案路徑
    }

 ?>


