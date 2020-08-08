<?php
if(isset($_POST['code'])){
	include_once("../data.php");
	$code = $_POST['code'];
	$sql = mysqli_query($data,"DELETE FROM BATCH_MST WHERE CODE = '$code' ");
	if($sql){
		echo"Deleted The Batch Successfully!";
	}
	else{
		echo"To Delete The Batch Failed!";
	}
	
}

?>