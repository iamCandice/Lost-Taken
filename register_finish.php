<?php session_start(); ?>//驗證資料是否正確
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connection.php");

$id = $_POST['id'];
$name = $_POST['name'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$uphone = $_POST['uphone'];
$email = $_POST['email'];

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        //新增資料進資料庫語法
        $sql = "insert into student (stu_id, stu_name, stu_pwd, stu_phone, stu_email) values ('$id', '$name', '$pw', '$uphone', '$email')";
        if(mysqli_query($conn,$sql))
        {
                echo '新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=enter.php>';
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=enter.php>';
        }
}

?>