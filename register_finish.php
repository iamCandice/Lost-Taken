<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connection.php");

$id = $_POST['id'];
$name = $_POST['name'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$uphone = $_POST['uphone'];
$email = $_POST["email"];

//判別資料
if($id == null || $name == null || $pw == null || $pw2 == null || $uphone == null || $email == null)
{
	$allErr = "資料不可空白！";
}
if($pw != $pw2)
{
	$pwErr = "密碼不一致！";
}
if ($uphone != null && !preg_match("/^([0-9]+)$/",$uphone)) 
{
 	 $phoneErr = "電話號碼只能是數字！"; 
}
if ($email != null && !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) 
{
 	 $emailErr = "email 格式錯誤！"; 
}
if ($id != null && !preg_match("/^([0-9A-Za-z]+)$/",$id)) 
{
 	$idErr = "帳號只能是英文、數字！"; 
}

//驗證帳號是否有人使用
 $dbid = "SELECT * FROM student WHERE stu_id = $id";
 $result = mysqli_query($conn, $dbid);
 while($row = @mysqli_fetch_row($result))
        {  
         if($id != null && $row[0] == $id)
         {
         	$idErr = "此帳號已有人使用！";
         }
        }
        
if($idErr == null && $pwErr ==  null && $allErr == null && $phoneErr == null && $emailErr == null)
{
        //新增資料進資料庫語法
        $sql = "insert into student (stu_id, stu_name, stu_pwd, stu_phone, stu_email) values ('$id', '$name', '$pw', '$uphone', '$email')";
        if(mysqli_query($conn,$sql))
        {
                echo "<script>alert('新增成功!');</script>";
                session_unset();
                echo '<meta http-equiv=REFRESH CONTENT=0;url=enter.php>';
        }
        else
        {
                echo "<script>alert('新增失敗!');</script>";
                echo '<meta http-equiv=REFRESH CONTENT=0;url=register.php>';
        }
}
else
{
	echo "<script>alert('$allErr$idErr$pwErr$phoneErr$emailErr');</script>";
	$_SESSION['reg_id']=$id;
	$_SESSION['reg_name']=$name;
	$_SESSION['reg_phone']=$uphone;
	$_SESSION['reg_email']=$email;
	echo '<meta http-equiv=REFRESH CONTENT=0;url=register.php?>';
}

?>