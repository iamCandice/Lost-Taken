<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connection.php");

if($_SESSION['stu_id'] != null)
{

        $id = $_GET["id"];
        $_SESSION['no'] = $id;

        $sql = "SELECT * FROM itemlog where no=".$id;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($result);
        
        echo "<form action=announce_finish.php method=post enctype=multipart/form-data>";
        echo "<table>";

        echo "編號：" .$row[0]. "<br>";

        echo  "物品名稱<input type=\"text\" name=\"itemname\" value=\"$row[1]\" /><br>";

        echo "描述<input type=\"text\" name=\"describe\" value=\"$row[2]\" /><br>";
        echo "上傳照片<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1000000\" /><input name=\"image\" type=\"file\"/><br>";
        
        echo "遺失/撿獲時間<input type=\"date\" name=\"date\" value= \"$row[4]\"/>
              <br>";

        echo "遺失/撿獲地點<select name=\"location\">
              <option value=\"系辦\">系辦</option>
              <option value=\"212\">212</option>   
              </select><br>";

        echo "已領/未領<select name=\"iftaken\" >
             <option value=\"0\">未領</option>
             <option value=\"1\">已領</option>
             </select><br>";

        echo "遺失或撿獲<select name=\"loseorfinder\">
              <option value=\"1\">我撿到東西</option>
              <option value=\"0\">我東西掉了</option>
              </select><br>";

        echo "</table><br>";
        echo "<input id=\"submit\" name=\"submit\" type=\"submit\" value=\"更新資料\"><br>";
  
        echo "</form>";
        $del = "DELETE FROM itemlog WHERE no =".$id;
        mysqli_query($conn, $del);
}  
else
{
        echo "<script>alert('您無權限觀看此頁面!');</script>";
        echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';
}
?>