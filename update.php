<?php session_start(); ?>//還沒完成~~
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connection.php");

if($_SESSION['no'] != null)
{
        //將$_SESSION['username']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
        $id = $_SESSION['no'];
        //若以下$id直接用$_SESSION['username']將無法使用
        $sql = "SELECT * FROM itemlog where no='$id'";
        $result = mysqli_query($sql);
        $row = mysql_fetch_row($result);
    
        echo "<form name=\"form\" method=\"post\" action=\"update_finish.php\">";
        echo "<table>";

        echo "物品名稱：<input type=\"text\" name=\"id\" value=\"$row[1]\" />(此項目無法修改) <br>";
        echo "描述：<input type=\"text\" name=\"describe\" value=\"$row[2]\" /> <br>";
        echo "上傳照片：<input type=\"image\" name=\"file\" value=\"$row[2]\" /> <br>";
        echo "遺失/撿獲時間：<input type=\"text\" name=\"date\" value=\"$row[3]\" /> <br>";
        echo "遺失/撿獲地點：<input type=\"text\" name=\"location\" value=\"$row[4]\" /> <br>";
        echo "已領/未領：<input type=\"text\" name=\"iftaken\" value=\"$row[5]\" /> <br>";
        echo "遺失或撿獲：<input type=\"text\" name=\"loseorfinder\" value=\"$row[6]\" /> <br>";


        echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
        echo "</table>";
        echo "</form>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>