<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//將session清空
echo '登出中......';
unset($_SESSION['stu_id']);
unset($_SESSION['stu_name']);
echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';


?>