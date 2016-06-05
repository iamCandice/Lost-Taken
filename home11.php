<!DOCTYPE html>
<html lang="en"> 
    <?php require("connection.php");?>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="shortcut icon" href="pic/log_logo.png">
      <title>布告欄</title>
      <link rel="stylesheet" href="css/index.css" type="text/css" />

       <script language="JavaScript" type="text/JavaScript">
          function MM_openBrWindow(theURL,winName,features) { //v2.0
          window.open(theURL,winName,features);
      }
    </script><!--ajax-->
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
                <a href="enter.php" class="menu_c">公告系統</a> | 
                <a href="contain.php" class="menu_c">聯絡我們</a> | 
                <a href="aboutus.php" class="menu_c">關於我們</a> 
                <div class="clear_both"></div>
            </div>
            <!-- ▲▲以上是選單項目▲▲ -->
        </div>
		          <!--登出-->
        <div class="content" style="text-align:right; margin-left:142px; width:1036px;" >
			<a href="logout.php"><img src="pic/logouticon.png" width="70" height ="40" border="0" /></a>
		</div>

                                         <!--以下是ajax-->
  <form action="home_search.php" method="post" name="formAdd" id="formAdd" onSubmit="return post();"> 
         遺失 、搜尋：
      <select name="the_area">  
            <option value= " ">不限</option>        
            <option value="lose">失物區</option>
            <option value="find">尋物區</option> 
         </select>
         地點：
      <select name="the_place">
            <option value=" ">不限</option> 
            <option value="212">212</option>
            <option value="office">系辦</option> 
            <option value="other">其他</option>
        </select> 
         是否領取：
      <select name="the_take">
            <option value=" ">不限</option> 
            <option value="taken">已領</option>
            <option value="orphan">未領</option> 
         </select>
         排序：
      <select name="orderby">      
            <option value="no" selected="true">依編號</option>
            <option value="time">依時間</option> 
         </select>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="action" type="hidden" value="add">
        <input type="submit" name="button" id="button" value="開始篩選"  onclick="post();"> 
    </form>
  </div>

  <div id="result"></div> 
  <script type="text/javascript" src="jquery-2.2.4.min.js"></script> 
  <script type="test/javascript"> 
  function post(){ 
      var the_area = $('#the_area').var; 
      var orderby = $('#orderby').var; 
      var the_place = $('#the_place').var; 
      var the_take = $('#the_take').var;  
      $.ajax({ 
      type: 'POST', 
      url: 'home_search.php', 
      data: "&the_area="+the_area+"&orderby="+orderby+"&the_place="+the_place+"&the_take="+the_take, 
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
                         <!--以上是ajax-->

	<div style="margin-left:142px; margin-right:142px; width:1036px; bgcolor:#ffffff; text-align:center;">
	    <table id="main" border=1> 
	        <td width="40px">NO</td>
	        <td width="100px">拾獲物品</td>
	        <td width="236px">物品特徵描述</td>
	        <td width="150px">照片</td>
	        <td width="100px">遺失/撿獲時間</td>
	        <td width="100px">遺失/撿獲地點</td>
	        <td width="50px">已領/未領</td>
	        <td width="100px">遺失或撿獲</td>
	        <td width="70px">我要認領</td>
       

<?php 
//分頁
  $result1 = mysqli_query($conn,'SELECT count(*) FROM itemlog'); 
  $data1 = mysqli_fetch_row($result1); // $data1[0] 就是資料總數
  $per = 5; //每頁顯示項目數量 
  $pages = ceil($data1[0]/$per); //總頁數
    if(!isset($_GET["page"]))
    { 
        $page=1; //設定起始頁 
    } 
    else 
    { 
        $page = intval($_GET["page"]); //確認頁數只能夠是數值資料 
        $page = ($page > 0) ? $page : 1; //確認頁數大於零 
        $page = ($pages > $page) ? $page : $pages; //確認使用者沒有輸入太神奇的數字 
    }
  $start = ($page-1)*$per; //每頁起始資料序號	
 $sql='SELECT * FROM itemlog ';
 $result = mysqli_query ($conn,$sql);

 foreach ($result as $key ) 
 { 

$iftaken = $key['iftaken'];
if($iftaken == 1)
{
	$str='已領';
}
else
{
	$str='未領';
}

$loseorfinder = $key['loseorfinder'];
if($loseorfinder == 1)
{
    $LT='我撿到東西';
}
else
{
    $LT='我東西掉了';
}
echo "<tr><td>".$key['no']."</td>
        <td>".($key['itemname'])."</td>
        <td>".($key['describe1'])."</td>
        <td><img src=".($key['image'])." alt='imgageid' height='150' width='150'></td>
        <td>".($key['idate'])."</td>
        <td>".($key['location'])."</td>
        <td>".($str)."</td>
        <td>".($LT)."</td>
        <td><button type='button' onclick='location.href='detail.php''><img src='pic/logouticon.png' width='50px' hieght='70px'></td></tr> ";
	}
  //頁碼連結
  for($i=1;$i<=$pages;$i++) 
  { 
      echo '<a href="?page='.$i.'">' . $i . '</a>'; 
  }
?>
		</table>
	</div>
</div>  
        <div class="footer" >
        <img src="pic/footer.png" width="1036" height="79">
        </div>           



</body>     