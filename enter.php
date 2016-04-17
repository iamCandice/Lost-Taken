<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/all.css" />
<html>
<head>
	<title>失物招領系統</title>
</head>
<body><center>
	<div class="wrap">
	<h1>登入系統<br></h1>
	<h2>用戶
	<form action="connect.php" method="POST">
	請輸入你的帳號 :<input type="text" name="id" value="您的學號"></input><br/>
	請輸入你的密碼 :<input type="password" name="pw"></input><br/>
	<input type="submit" name="button" value="用戶登入" />
	<a href="register.php">申請帳號</a>
	<br><br><br>
	</form>
	
	管理員
	<form action="ad_conn.php" method="POST">
	請輸入你的帳號 :<input type="text" name="id"></input><br/>
	請輸入你的密碼 :<input type="password" name="pw"></input><br/>
	<input type="submit" name="button" value="管理員登入" /> <br>
	</form></h2></center>
	
	<div class="fixed"><a href="./index.php">首頁 </a>
	</div>
</div>

</body>
</html>