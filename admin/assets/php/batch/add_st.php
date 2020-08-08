<?php

if(isset($_POST['st']) AND isset($_POST['b_mst_code'])){
	include_once("../data.php");
	$b_mst_code = $_POST['b_mst_code'];
	$st = $_POST['st'];
	$st_code = array();
	
	// loop for get st_code
	for($a=0;$a<count($st);$a++){
		$code = $st[$a];
		$q = mysqli_fetch_array(mysqli_query($data,"SELECT CODE FROM STUDENT_REG WHERE REG_CODE = '$code'"));
		array_push($st_code,$q['CODE']);
	}
	
	// loop for deleting other batch of student if exists
	for($a=0;$a<count($st_code);$a++){
		$code = $st_code[$a];
		$row = mysqli_num_rows(mysqli_query($data,"SELECT * FROM BATCH_DLT WHERE BATCH_CODE_MST='$b_mst_code' AND REG_CODE='$code'"));
		if($row > 0){
			mysqli_query($data,"DELETE FROM BATCH_DLT WHERE BATCH_CODE_MST='$b_mst_code' AND REG_CODE='$code'");
		}	
	} 
	exit();
	$sql = mysqli_query($data,"INSERT INTO BATCH_MST (`BATCH_CODE`,`BATCH_DATE`,`COURSE_CODE`,`DESCRIPTION`)VALUES('$b_code','$dat','$course','$des')");
	if(!$sql){echo"There is an Error In Inserting Data!";}
	else{
		echo"OK";
	}
}
else{
	echo"There is an Error In Recieving Data!";
}




?>