<!DOCTYPE html>//表格不確定正確
<html lang="en">
<head>
    <?php 
    #$conn=mysqli_connect("127.0.0.1",'root','usbw','database');
    require_once('./connection.php');
    ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/all.css" />
    <title>212失物招領</title>
</head>
<body>
<div class="wrap">
    <table class="main"  cellpadding=0 bgcolor=#198799 style="padding:20px;">
        <tr>
            <td colspan=3 align="center">
                <font color=white style="font-size: 200%;" >212遺失物公告</font>               
            </td>
        </tr>
    </table>
    <table id="main" border=1 width=100% bgcolor=#ffffff> 
        <td>NO</td>
        <td>拾獲物品</td>
        <td>物品特徵描述</td>
        <td>照片</td>
        <td>遺失/撿獲時間</td>
        <td>遺失/撿獲地點</td>
        <td>已領/未領</td>
        <td>遺失或撿獲</td>
       

<?php 	
 $sql='select * FROM itemlog where 1';
 $result = mysqli_query ($conn,$sql);


	# code...

 #for ($i=0; $i <9 ; $i++) 
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
        <td><img src=".($key['image'])." alt='imgageid' height='300' width='300'></td>
        <td>".($key['date'])."</td>
        <td>".($key['location'])."</td>
        <td>".($str)."</td>
        <td>".($LT)."</td></tr> ";

	}
?>
</table>

<div class="fixed"><a href="./index.php">首頁 </a>
</div>


</div>



</body>