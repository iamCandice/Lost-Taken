<?php session_start();?>
<?php
	//echo $_POST['aaa'];
	//echo "vjisjvds";
	echo $_FILES['file']['name']."</br>";
	$nowtime =strtotime("now");	
	$ext = preg_replace('/^.*\.([^.]+)$/D', '$1', $_FILES['file']['name']);
	//$name=$_SESSION['MM_Username'];
	//$name="ok";
	$work ="ok";
	//$work ="ok";
	//@mkdir($work);
	mkdir('ok', 0777, true);
	$work_file_path = $work."/".$nowtime.".".$ext;
	//$work_file_path .= $nowtime.".".$ext;
	if(move_uploaded_file($_FILES["file"]["tmp_name"],$work_file_path))
	{
		echo "successful";
	}
	else
	{
		echo "fail";
	}
?>