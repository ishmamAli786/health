<?php
if(isset($_POST['name']) && isset($_POST['course']) && isset($_POST['adm_date']) && isset($_POST['fee']) && isset($_POST['dis']) && isset($_POST['dised']) && isset($_POST['no_of_ins']) && isset($_POST['dat']) && isset($_POST['ins']) && isset($_POST['batch']) && isset($_POST['project']) && isset($_POST['officer'])){
	// attach database
	include_once("../data.php");
	$code = substr(trim($_POST['name']),-13,-1);
	$project = $_POST['project'];
	$officer = $_POST['officer'];
	$course = $_POST['course'];
	$fee = $_POST['fee'];
	$dis = $_POST['dis'];
	$dised = $_POST['dised'];
	$batch = $_POST['batch'];
	$no_of_ins = $_POST['no_of_ins'];
	$dat = $_POST['dat'];
	$ins = $_POST['ins'];
	$adm_date = date('Y-m-d',strtotime($_POST['adm_date']));
		$q = mysqli_fetch_array(mysqli_query($data,"SELECT st_code as code FROM student_reg WHERE reg_code = '$code'"));
		$st_code = $q['code'];
		$sql = mysqli_query($data,"INSERT INTO student_reg (st_code,course_code,discount,amount,org_fee,batch_code,no_of_ins,reg_date,project,admit_officer)VALUES('$st_code','$course','$dis','$dised','$fee','$batch','$no_of_ins','$adm_date','$project','$officer')");
		if(!$sql){
			echo"There is an error in student registration!";
			exit();
		}
		else{
			$q2 = mysqli_fetch_array(mysqli_query($data,"SELECT MAX(CODE) as cod FROM student_reg WHERE st_code ='$st_code'"));
			$st_reg_code = $q2['cod'];
			// use for loop for query
			for($a=0;$a<count($ins);$a++){
				$date = date('Y-m-d',strtotime($dat[$a]));
				$inst = round($ins[$a]);
				$sql = mysqli_query($data,"INSERT INTO student_ins (reg_code,ins_date,ins_amount)VALUES('$st_reg_code','$date','$inst')");
			}
			if(!$sql){
				echo"There is an error in student installations!";
				exit();
			}
			else{
				echo"OK";
			}
		}
	}
else{
	echo"NOT";
}	
?>