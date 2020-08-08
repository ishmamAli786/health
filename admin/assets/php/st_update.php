<?php
if(isset($_POST['name']) && isset($_POST['f_name']) && isset($_POST['p_no']) && isset($_POST['f_no']) && isset($_POST['e_no']) && isset($_POST['adr']) && isset($_POST['email']) && isset($_POST['course']) && isset($_POST['fee']) && isset($_POST['dis']) && isset($_POST['dised']) && isset($_POST['no_of_ins']) && isset($_POST['dat']) && isset($_POST['ins']) && isset($_POST['batch']) && isset($_POST['dob']) && isset($_POST['cnic']) && isset($_POST['gen']) && isset($_POST['project']) && isset($_POST['officer']) && isset($_POST['st_code']) && isset($_POST['reg_code']) && isset($_POST['status']) && isset($_POST['educat'])){
	// attach database
	include_once("data.php");
	$name = $_POST['name'];
	$f_name = $_POST['f_name'];
	$p_no = $_POST['p_no'];
	$f_no = $_POST['f_no'];
	$e_no = $_POST['e_no'];
	$dob = date('Y-m-d',strtotime($_POST['dob']));
	$cnic = $_POST['cnic'];
	$gen = $_POST['gen'];
	$project = $_POST['project'];
	$officer = $_POST['officer'];
	$adr = $_POST['adr'];
	$email = $_POST['email'];
	$course = $_POST['course'];
	$fee = $_POST['fee'];
	$dis = $_POST['dis'];
	$dised = $_POST['dised'];
	$batch = $_POST['batch'];
	$no_of_ins = $_POST['no_of_ins'];
	$dat = $_POST['dat'];
	$ins = $_POST['ins'];
	$adm_date = date('Y-m-d',strtotime($_POST['adm_date']));
	$st_code = $_POST['st_code'];
	$reg_code = $_POST['reg_code'];
	$status = $_POST['status'];
	$educat = $_POST['educat'];
	$sql = mysqli_query($data,"UPDATE student_mst SET 				
	name='$name',
	f_name='$f_name',
	contact_p='$p_no',
	contact_f='$f_no',
	contact_e='$e_no',
	address='$adr',
	email='$email',
	dob='$dob',
	cnic='$cnic',
	gen='$gen',
	education='$educat'
	 WHERE code='$st_code'");
	if(!$sql){
		echo"There is an error in student basic information!";
		exit();
	}
	else{
		$sql = mysqli_query($data,"UPDATE student_reg SET course_code='$course',
		discount='$dis',
		amount='$dised',
		org_fee='$fee',
		batch_code='$batch',
		no_of_ins='$no_of_ins',
		reg_date='$adm_date',
		project='$project',
		status='$status',
		admit_officer='$officer' 
		WHERE code='$reg_code'");
		if(!$sql){
			echo"There is an error in student registration!";
			exit();
		}
		else{
			$rows = mysqli_num_rows(mysqli_query($data,"SELECT * FROM student_ins WHERE reg_code='$reg_code'"));
			// deleting previous installments
			for($c=0;$c<$rows;$c++){
				mysqli_query($data,"DELETE FROM student_ins WHERE reg_code='$reg_code'");	
			}
			for($a=0;$a<count($ins);$a++){
				$date = date('Y-m-d',strtotime($dat[$a]));
				$inst = round($ins[$a]);
				$sql = mysqli_query($data,"INSERT INTO student_ins (reg_code,ins_date,ins_amount)VALUES('$reg_code','$date','$inst')");
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
}
else{
	echo"NOT";
}	
?>