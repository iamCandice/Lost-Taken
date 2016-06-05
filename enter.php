<?phpsession_start();?>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
	<head>
		<link rel="shortcut icon" href="pic/log_logo.png"><!--標籤logo-->
		<title>公告系統登入</title>
		<link rel="stylesheet" href="css/login.css" />
	</head>

	<body>
		<div class="sitebody">
	        <div class="header">
	            <div class="logo">
					<a href="http://140.127.218.250:49002"><img src="pic/logo.png" width="290" height="163"></a>
				</div>
	            <!-- ▼▼以下是選單項目▼▼ -->
	            <div id="menubar">
	           
					<a href="index.php" class="menu_c" style="font-family:微軟正黑體;" >首頁</a> | 
	                <a href="home.php" class="menu_c" style="font-family:微軟正黑體;" >佈告欄</a> | 
	                <a href="enter.php" class="menu_c" style="font-family:微軟正黑體;" >公告系統</a> | 
	                <a href="contain.php" class="menu_c" style="font-family:微軟正黑體;" >聯絡我們</a> | 
	                <a href="aboutus.php" class="menu_c" style="font-family:微軟正黑體;" >關於我們</a> 
	                <div class="clear_both"></div>
	            </div>
	          </div>

	    <div class="content" style="background-image:url(pic/login.png); ">
			<form action="connect.php" method="post">
				
				<input type="text" name="id" placeholder="帳號" style="width:280px; height:35px; padding:5px; 
									border:2px solid #888888; border-radius: 5px; position:relative; top:150px; " required><br/>
				<input type="password" name="pw" placeholder="密碼" required><br/>

				<input type="submit" value="登入" style="font-family:'微軟正黑體';"><br/>

				<a href="register.php" style="color:#444444; margin-top:70px; font-size:12;font-family:微軟正黑體; position:relative; top:230px;">註冊會員</a>
				<a href="forgetpwd.php" style="color:#444444; margin-top:70px; font-size:12;font-family:微軟正黑體; position:relative; top:230px;">忘記密碼</a>
			</form>
		</div>

        <div class="footer" >
        <img src="pic/footer.png" width="1036" height="79">
        </div><!--在圖片中更改-->
      </div>

  </body>

</html>