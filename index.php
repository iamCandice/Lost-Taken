<?php session_start();?>
<?php
      $file = fopen("visitors.txt","r");//r = read
      $num = fgets($file);//參觀人數
      fclose($file);

    if($_SESSION['come']!="v")//防止灌票
    {
      $num++;
      $file = fopen("visitors.txt","w");//w = 複寫
      fwrite($file, $num);
      fclose($file);
      $_SESSION['come']="v";
    }
?>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	  <link rel="shortcut icon" href="pic/log_logo.png">
	  <title>失物招領</title>

	  <script language="JavaScript" type="text/JavaScript">
          function MM_openBrWindow(theURL,winName,features) { //v2.0
          window.open(theURL,winName,features);
      	}
    	</script><!--ajax-->

	  <link rel="stylesheet" href="css/index.css" type="text/css" />
      <style type="text/css">

      	

        #infor{
          margin-left:142px;
          margin-bottom:0px;/*間距*/
          width:1036px;
          height:260px; /*186-30*/
          padding-bottom:20px; /*邊界，這樣才不會依照比例變動*/
          font-family:微軟正黑體;
          font-size:20px;
          color:white;
        }
        #move_infor{
          /*width:1036px; height:302px;*/
          margin-left:50px;
          margin-right:50px;
          margin-top:  0px;
          text-align:center;
          height:300px;
          background-color:none;
          
        }
        #area{
          margin-left:0px;/*左邊間距*/
          margin-right:80px;
          margin-top: 20px;
          text-align:center;
          width:300px;
          height:300px; /*186-30*/
          height:300px;
        } 
        
      </style>
  </head>
  <body>
      <div class="sitebody">
        <div class="header">
            <div class="logo">
					<!--新增-->
			<a href="http://140.127.218.250:49002"><img src="pic/logo.png" width="290"
  height="143"></a>
			</div>
            <!-- ▼▼以下是選單項目▼▼ -->
            <div id="menubar">
				        <a href="index.php" class="menu_c">首頁</a> | 
                <a href="home.php" class="menu_c">佈告欄</a> | 
                <a href="announce.php" class="menu_c">公告系統</a> | 
                <a href="contain.php" class="menu_c">聯絡我們</a> | 
                <a href="aboutus.php" class="menu_c">關於我們</a> 
                <div class="clear_both"></div>
            </div>
            <!-- ▲▲以上是選單項目▲▲ -->
        </div>
		          <!--登入登出-->
        <div class="content" style="text-align:right; margin-left:142px; width:1036px;" >
      <a href="enter.php"><img src="pic/logouticon.png" width="70" height ="40" border="0" /></a>
			<a href="logout.php"><img src="pic/logouticon.png" width="70" height ="40" border="0" /></a>
		</div>
        <!-- ▼▼以下是新增項目▼▼ -->
  
    <table>
      <td>
        <!--最下面的四個塗：失物區、尋物區-->
        <div id="area" style=" margin-left:100px">
        	<!--這是失物區-->
	    	<form action="home.php" method="post" name="formAdd" id="formAdd" > 
        		<button type="submit" name="the_area" value='find' style = "background-color: transparent; border: 0;"><img src="pic/1.png" height="100%" width="130%" onclick="post();"></button>
   			 </form>
	     </div>
      </td>
				<!--廣告區-->
      <td>
		        <div id="move_infor"><?php include("AD.html"); ?></div>
		        
      </td>
			<!--這是尋物區-->
      <td>
        <div id="area">
	        <form action="home.php" method="post" name="formAdd" id="formAdd" > 
				<button type="submit" name="the_area" value='lose' style = "background-color: transparent; border: 0;"><img src="pic/2.png" height="100%" width="130%" onclick="post();"></button>
   			 </form>
	    /<div>
      </td>
     </table> 

     <!--ajax-->
	<div id="result"></div> 
  <script type="text/javascript" src="jquery-2.2.4.min.js"></script> 
  <script type="test/javascript"> 
  function post(){ 
      var the_area = $('#the_area').var;

      $.ajax({ 
      type: 'POST', 
      url: 'home.php', 
      data: "&the_area="+the_area, 
      success: function(response) 
      { 
         if(response == "0") 
         { 
           $('#result').html('success');    
         } 
         if(response == "1") 
         { 
           $('#result').html('lose');   
         } 
      } 
       
  }); 
  }; 
  </script> 

    <div class = "count">
        <?php
        echo "參觀人數：";
          $string = strlen($num);
          for ($i = 0; $i < $string; $i++){
            $n = substr($num,$i,1);
            echo "<img src=pic/number/$n.png width= 30 height= 30 />";
          }
        ?>
		</div>



	        <!-- ▲▲以上是新增項目▲▲ -->
	        <div class="footer">
	        <img src="pic/footer.png" width="1036"
  height="79">
	        </div>      
	</div>
  </body>
</html>
