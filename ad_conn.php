<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/all.css" />
	<title></title>
</head>
<body><h2>
<div class="wrap">

<?php session_start(); ?>
<!--�W��y�k���ҥ�session�A���y�k�n��b�����̫e��-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

	if(isset($_POST["id"]) && isset($_POST["pw"]))
	{
//�s����Ʈw
//�u�n�������W���Ψ�s��MySQL�N�ninclude��
require("connection.php");
$id = $_POST['id'];
$pw = $_POST['pw'];

//�j�M��Ʈw���
$sql = "SELECT * FROM manager where m_id = '$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($result);
//�P�_�b���P�K�X�O�_���ť�
//�H��MySQL��Ʈw�̬O�_���o�ӷ|��
		echo "<center>";
if($id != null && $pw != null && $row[0] == $id && $row[2] == $pw)
	{
        //�N�b���g�Jsession�A��K���ҨϥΪ̨���
        $_SESSION['m_id'] = $id;

        echo 'Enter Success';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=announce.php>';
	}
	else
	{
        echo 'Failing';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=enter.php>';
	}
	echo "</center>";
}
	?>

</h2>
</body>
</html>


