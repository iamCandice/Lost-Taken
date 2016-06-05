<?php session_start();?>
<html>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
檔案名稱:<input type="file" name="file" id="file" /><br />
<input type='text' name='aaa' ><br/>
<input type="submit" name="submit" value="上傳檔案" />
</form>

</body>
</html>
<?php  
//$now =strtotime("now");

//$da=date("Y-m-d H:i:s");
//$y=date("Y");
//$m=date("m");
//$d=date("d");
	//$work_file_path .="/". $y . "/";
	//$work_file_path .= $m . "/";
	//echo $_SESSION['MM_Username']."<br>";
	//$name=$_SESSION['MM_Username'];
	//$name="testt";
	//echo $name;
	//$work_file_path ="$name";
	//@mkdir($work_file_path);
//$work_file_path .= "../exam_ppt/" . $y . ".".$m. ".".$d. "/";
  //$work_file_path = $work_file_path ."/". $y . ".".$m. ".".$d. "/";
  // @mkdir($work_file_path);
//  $work_file_path .= "exam_ppt/".$y.".".$m.".".$d."/".$name."/".$now."/";
  //@mkdir($work_file_path);//建立資料夾
  
 
  // echo $work_file_path;


?>