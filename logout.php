<?php 
session_start(); 
?>
<?php
if(!$_SESSION['stu_id']){
	echo "<script>alert('尚未登入喔！')</script>";
	header("refresh:0.1;url=index.php");
		
}
else{
	session_unset();
	echo "<script>alert('登出成功!')</script>";
	header("refresh:0.1;url=index.php");
}	
	
?>