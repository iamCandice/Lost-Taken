<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>註冊會員</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>


<form name="form" method="post" action="register_finish.php">
<?php
$id = $_SESSION['reg_id'];
$name = $_SESSION['reg_name'];
$uphone = $_SESSION['reg_phone'];
$email = $_SESSION['reg_email'];

echo "帳號：<input type=\"text\" name=\"id\" value=\"$id\" maxlength=\"19\" /> <br>";
echo "姓名：<input type=\"text\" name=\"name\" value=\"$name\" maxlength=\"29\"/> <br>";
echo "密碼：<input type=\password\" name=\"pw\" maxlength=\"19\"/> <br>";
echo "再一次輸入密碼：<input type=\"password\" name=\"pw2\" /> <br>";
echo "電話：<input type=\"text\" name=\"uphone\" value=\"$uphone\" maxlength=\"9\"/> <br>";
echo "Email：<input type=\"text\" name=\"email\" value=\"$email\" maxlength=\"49\"/> <br>";
echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";

?>
</form>

</body>
</html>