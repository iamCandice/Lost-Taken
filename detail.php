<?php session_start(); 
require("connection.php");?>

<html lang="en">
<head>  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="UTF-8">

  <title>發布系統</title>
</head>
<body>
  <?php
  	if($_SESSION['stu_id']!=null)
  	{
	 	$id = $_GET["id"];
        $_SESSION['no'] = $id;

        $sql = "SELECT * FROM itemlog where no=".$id;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($result);
        
        echo "<table border = 1>";

        echo "編號：" .$row[0]. "<br>";

        echo "<tr><td width=\"100px\">拾獲物品</td>
	        <td colspan=\"2\" width=\"300px\">遺失/撿獲時間</td></tr>";
	    echo "<tr><td>".$row[1]."</td><td colspan=\"2\" >".$row[4]."</td></tr>";

	    echo "<tr><td colspan=\"2\" width=\"300px\">照片</td>
	    	<td width=\"100px\">物品特徵描述</td></tr>";
	    echo "<tr><td colspan=\"2\" ><img src=".($row[3])." alt='imgageid' height='300' width='300'></td><td>".$row[2]."</td></tr>";	

	    echo "<tr><td width=\"100px\">已領/未領</td>
	        <td width=\"150px\">遺失或撿獲</td>
	        <td width=\"150px\">遺失/撿獲地點</td></tr>";
	    echo "<tr><td>".$row[5]."</td>";
	    if($row[6] == 1){
				echo "<td>已領</td>";
			}
			else{
				echo "<td>未領</td>";
			}
			if ($row[7] == 1){
				echo "<td>我撿到東西</td>";
			}
			else{
				echo "<td>我東西掉了</td>";
			}
        echo "</tr>";
        echo "</table><br>";


        $stu_sql = "SELECT * FROM student where stu_id=".$row[6];
        $stu_result = mysqli_query($conn, $stu_sql);
        $stu_data = mysqli_fetch_row($stu_result);

        echo "好心人的電話：".$stu_data[3];
        echo "<br>";
        echo "好心人的EMAIL：".$stu_data[4];
    }
    else
    {
    	echo '請先登入!<br>';
    	echo "請注意：您的這個舉動將會留下紀錄，請勿蓄意竊取他人資料";
    }
?>
</body>