<!DOCTYPE html>
<html lang="en"> 
    <?php require("connection.php");?>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="shortcut icon" href="pic/log_logo.png">
      <title>布告欄</title>

        <script language="JavaScript" type="text/JavaScript">
          function MM_openBrWindow(theURL,winName,features) { //v2.0
          window.open(theURL,winName,features);
      }
    </script><!--ajax-->

      <link rel="stylesheet" href="css/index.css" type="text/css" />
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



<!--以下是布告欄-->
  <div class="content" style="text-align:left; margin-left:142px; width:1036px;hieght:500px; " >


 								 <!--以下是ajax-->
  <form action="home_search.php" method="post" name="formAdd" id="formAdd" onSubmit="return post();"> 

      <select name="the_area">         
            <option value="lose">失物區</option>
            <option value="find" selected="true">尋物區</option> 
         </select>&nbsp;&nbsp;
         地點：
      <select name="the_place">
            <option value=" ">不限</option> 
            <option value="212">212</option>
            <option value="office">系辦</option> 
            <option value="other">其他</option>
        </select>&nbsp;&nbsp;
         是否領取：
      <select name="the_take">
            <option value=" ">不限</option> 
            <option value="taken">已領</option>
            <option value="orphan">未領</option> 
         </select>&nbsp;&nbsp;
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
	$area = " "; $place = " "; $take = " ";
	//篩選設定
	  if($_POST['the_area'] == 'find')
	  {
	    $area = "loseorfinder = '1'";
	  }
	  if($_POST['the_area'] == 'lose')
	  {
	    $area = "loseorfinder = '0'";
	  }


	  if($_POST['the_place'] == 'office')
	  {
	    $place = " AND location = '系辦'";
	  }
	  if($_POST['the_place'] == '212')
	  {
	    $place = " AND location = '212'";
	  }


	  if($_POST['the_take'] == 'taken')
	  {
	    $take = " AND iftaken = '1'";
	  }
	  if($_POST['the_take'] == 'orphan')
	  {
	    $take = " AND iftaken = '0'";
	  }

	  if($_POST['orderby'] == 'no')
	  {
	    $orderby = "no";
	  }
	  if($_POST['orderby'] == 'time')
	  {
	    $orderby = "idate";
	  }

//資料庫連結<<分頁>>
	$search ="SELECT * FROM itemlog ";
	if($area !=" " || $place != " " || $take !=" ")
	    { 
	      $search ="SELECT * FROM itemlog WHERE ($area $place $take)"; 
	    } 
	 
	$result2 = mysqli_query($conn,$search)or die("Error1");;
    $data_nums = mysqli_num_rows($result2); //$data_nums[0]=總數

    $per = 5; //每頁顯示項目數量
    $pages = ceil($data_nums/$per); //取得不小於值的下一個整數
    if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
        $page=1; //則在此設定起始頁數
    } 
    else 
    {
        $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
    }
    $start = ($page-1)*$per; //每一頁開始的資料序號
    $result2 = mysqli_query($conn,$search.'ORDER BY ('.$orderby.') DESC LIMIT '.$start.', '.$per) or die("Error2");
	//篩選模式

    //若是沒有搜查結果
    if ($data_nums == 0) {
     	echo "<tr><td colspan=\"9\" ><img src='pic/Lighthouse.jpg' width='1036px'></td></tr> ";//這裡要畫圖
     } 
	    

	//顯示表格
	while($key = mysqli_fetch_row($result2)) 
	{ 
	    $iftaken = $key[6];
	    if($iftaken == 1)
	    {
	      $str='已領';
	    }
	    else
	    {
	      $str='未領';
	    }

	    $loseorfinder = $key[7];
	    if($loseorfinder == 1)
	    {
	        $LT='招領中';
	    }
	    else
	    {
	        $LT='尋找中';
	    }
	    echo "<tr><td>".$key[0]."</td>
	            <td>".($key[1])."</td>
	            <td maxlength:50>".($key[2])."</td>
	            <td><img src=".($key[3])." alt='imgageid' height='150' width='150'></td>
	            <td>".($key[4])."</td>
	            <td>".($key[5])."</td>
	            <td>".($str)."</td>
	            <td>".($LT)."</td>
	            <td><a href=\"#\" title=\"開新視窗\" onclick=\"MM_openBrWindow('detail.php?id=".$key[0]."','test','width=500,height=600')\" onKeypress=\"MM_openBrWindow('detail.php?id=".$key[0]."','test','width=500,height=600')\"><img src='pic/logouticon.png' width='50px' hieght='70px'></a></td></tr> ";
	}
	
?>   
    </table>
<?php
    //分頁頁碼
    echo '搜尋到 '.$data_nums.' 筆資料 -- 第 '.$page.' 頁-共 '.$pages.' 頁'; 
    echo "<br /><a href=?page=1>首頁</a> ";
    echo "第 ";
    for( $i=1 ; $i<=$pages ; $i++ ) {
        if ( $page-3 < $i && $i < $page+3 ) {
            echo "<a href=?page=".$i.">".$i."</a> ";
        }
    } 
    echo " 頁 <a href=?page=".$pages.">末頁</a><br /><br />";
?>
  </div>
</div>  
        <div class="footer" >
        <img src="pic/footer.png" width="1036" height="79">
        </div>           
</body>     
</html>