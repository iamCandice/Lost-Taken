<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require_once('./connection.php');

  $no = $_POST['no'];
  $itemname = $_POST['itemname'];
  $describe = $_POST['describe'];
  $image="http://140.127.218.250:49002/file/".$_FILES['image']['name'];
  $date = $_POST['date'];
  $location = $_POST['location'];
  $iftaken =  $_POST['iftaken'];
  $loseorfinder = $_POST['loseorfinder'];

//紅色字體為判斷密碼是否填寫正確

        

if($_SESSION['stu_id'] != null)
{

            //刪除資料庫資料語法
              $itemNO = $_SESSION['item'];
            //更新資料庫資料語法
              //, describe1=$describe, image=$image,date=$date, location=$location, iftaken=$iftaken, loseorfinder=$loseorfinder, finder=$finder, belongwho=$belongwho 

            $sql = "Update itemlog Set itemname=$itemname, describe1=$describe, image=$image,date=$date, location=$location, iftaken=$iftaken, loseorfinder=$loseorfinder, finder=$finder, belongwho=$belongwho WHERE $itemNO = $_SESSION['item']";
      
            if(mysql_query($sql))
            {
                    echo '修改成功!';
                    echo '<meta http-equiv=REFRESH CONTENT=2;url=delete.php>';
            }
            else
            {
                    echo '修改失敗!';
                    echo '<meta http-equiv=REFRESH CONTENT=2;url=delete.php>';
            }
         
    
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>