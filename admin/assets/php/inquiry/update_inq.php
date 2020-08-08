<?php
include_once("../data.php");
if(isset($_POST['code']) AND isset($_POST['name']) AND isset($_POST['mob']) AND isset($_POST['dat']) AND isset($_POST['course']) AND isset($_POST['area']) AND isset($_POST['status']) AND isset($_POST['date1']) AND isset($_POST['date2']) AND isset($_POST['date3']) AND isset($_POST['msg1']) AND isset($_POST['msg2']) AND isset($_POST['msg3'])){
	$course = $_POST['course'];
	$mob = $_POST['mob'];
	$dat = date('Y-m-d',strtotime($_POST['dat']));
	$st_name = $_POST['name'];
	$code = $_POST['code'];
	$area = $_POST['area'];
	$status = $_POST['status'];
	$dat1 = date('Y-m-d',strtotime($_POST['date1']));
	$dat2 = date('Y-m-d',strtotime($_POST['date2']));
	$dat3 = date('Y-m-d',strtotime($_POST['date3']));
	$msg1 = $_POST['msg1'];
	$msg2 = $_POST['msg2'];
	$msg3 = $_POST['msg3'];
	$sql = mysqli_query($data,"UPDATE inquiry SET name='$st_name',contact='$mob',date='$dat',course='$course',area='$area',status='$status',follow_date1='$dat1',follow_up1='$msg1',follow_date2='$dat2',follow_up2='$msg2',follow_date3='$dat3',follow_up3='$msg3' WHERE code='$code'");
	if(!$sql){
		echo"Please Check Your Entries!";
	}
	else{
		echo"OK";
	}
}
else{
	echo"ERROR";
}

?>