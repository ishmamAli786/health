<?php
if(isset($_POST['code'])){
	include_once("../data.php");
	$code = $_POST['code'];
	$sql = mysqli_query($data,"UPDATE BATCH_MST SET PASSED_OUT = 1 WHERE CODE = '$code' ");
	if($sql){
		echo"Inactive The Batch Successfully!";
	}
	else{
		echo"Inactive The Batch Failed!";
	}
	
}
elseif(isset($_POST['active_code'])){
	include_once("../data.php");
	$code = $_POST['active_code'];
	$sql = mysqli_query($data,"UPDATE BATCH_MST SET PASSED_OUT = 0 WHERE CODE = '$code' ");
	if($sql){
		echo"activate The Batch Successfully!";
	}
	else{
		echo"activate The Batch Failed!";
	}
	
}







?>