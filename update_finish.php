<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$homephone = $_POST['homephone'];

//紅色字體為判斷密碼是否填寫正確
if($_SESSION['uName'] != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        $id = $_SESSION['uName'];
    
        //更新資料庫資料語法
        $sql = "update week6 set uPWD=$pw, homephone=$homephone where uName='$id'";
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