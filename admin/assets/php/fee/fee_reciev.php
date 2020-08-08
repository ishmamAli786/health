<?php
include_once("../data.php");
if(isset($_POST['dat']) AND isset($_POST['amt']) AND isset($_POST['st']) AND isset($_POST['reciept'])){
	$reg_code = substr(trim($_POST['st']),-13,-1);
	$amount = $_POST['amt'];
	$dat = date('Y-m-d',strtotime($_POST['dat']));
	$reciept = $_POST['reciept'];
	$q = mysqli_fetch_array(mysqli_query($data,"SELECT CODE FROM STUDENT_REG WHERE REG_CODE='$reg_code'"));
	$reg_student = $q['CODE'];
	$sql = mysqli_query($data,"INSERT INTO FEE_REC (FEE_DATE,REG_CODE,AMOUNT,RECIEPT_NO)VALUES('$dat','$reg_student','$amount','$reciept')");
	if(!$sql){
		echo"Please Check Your Entries!";
	}
	else{
		echo"OK";
	}
}


?>