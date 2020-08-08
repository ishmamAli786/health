<?php
if(isset($_POST['code'])){
	$code = $_POST['code'];
	include_once("../data.php");
	$sql = mysqli_query($data,"DELETE FROM inquiry WHERE code = '$code'");
	if($sql){
		echo"Inquiry has been successfully deleted";
	}
	else{
		echo'Inquiry Failed to delete';
	}
}

?>