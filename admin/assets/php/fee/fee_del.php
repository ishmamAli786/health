<?php
if(isset($_POST['code'])){
	$code = $_POST['code'];
	include_once("../data.php");
	$sql = mysqli_query($data,"DELETE FROM FEE_REC WHERE CODE = '$code'");
	if($sql){
		echo"Receiving has been successfully deleted";
	}
	else{
		echo'Recieving Failed to delete';
	}
}


?>