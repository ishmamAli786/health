<?php
include_once("../data.php");
if(isset($_POST['dat']) AND isset($_POST['mob']) AND isset($_POST['st_name']) AND isset($_POST['course']) AND isset($_POST['area'])){
	$course = $_POST['course'];
	$mob = $_POST['mob'];
	$dat = date('Y-m-d',strtotime($_POST['dat']));
	$st_name = $_POST['st_name'];
	$area = $_POST['area'];
	$sql = mysqli_query($data,"INSERT INTO inquiry (name,contact,date,course,area)VALUES('$st_name','$mob','$dat','$course','$area')");
	if(!$sql){
		echo"Please Check Your Entries!";
	}
	else{
		echo"OK";
	}
}


?>