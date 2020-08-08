<?php

if(isset($_POST['des']) AND isset($_POST['course']) AND isset($_POST['teacher']) AND isset($_POST['dat']) AND isset($_POST['b_code'])){
	include_once("../data.php");
	$course = $_POST['course'];
	$des = $_POST['des'];
	$teacher = $_POST['teacher'];
	$dat =date("Y-m-d",strtotime($_POST['dat']));
	$b_code = $_POST['b_code'];
	$sql = mysqli_query($data,"INSERT INTO BATCH_MST (`BATCH_CODE`,`BATCH_DATE`,`COURSE_CODE`,`DESCRIPTION`,`TEACHER`)VALUES('$b_code','$dat','$course','$des','$teacher')");
	if(!$sql){echo"There is an Error In Inserting Data!";}
	else{
		echo"OK";
	}
}
else{
	echo"There is an Error In Recieving Data!";
}




?>