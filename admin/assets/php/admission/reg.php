<?php
if(isset($_POST['name']) && isset($_POST['f_name']) && isset($_POST['p_no']) && isset($_POST['f_no']) && isset($_POST['e_no']) && isset($_POST['adr']) && isset($_POST['email']) && isset($_POST['course']) && isset($_POST['fee']) && isset($_POST['dis']) && isset($_POST['dised']) && isset($_POST['no_of_ins']) && isset($_POST['dat']) && isset($_POST['ins']) && isset($_POST['batch']) && isset($_POST['dob']) && isset($_POST['cnic']) && isset($_POST['gen']) && isset($_POST['project']) && isset($_POST['officer']) && isset($_POST['educat'])){
	// attach database
	include_once("../data.php");
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
	$educat = $_POST['educat'];
	$adm_date = date('Y-m-d',strtotime($_POST['adm_date']));
	//echo $adm_date;
	//exit();
	$sql = mysqli_query($data,"INSERT INTO student_mst (name,f_name,contact_p,contact_f,contact_e,address,email,dob,cnic,gen,education)VALUES('$name','$f_name','$p_no','$f_no','$e_no','$adr','$email','$dob','$cnic','$gen','$educat')");
	if(!$sql){
		echo"There is an error in student basic information!";
		exit();
	}
	else{
		$q = mysqli_fetch_array(mysqli_query($data,"SELECT MAX(CODE) as cod FROM student_mst"));
		$st_code = $q['cod'];
		$sql = mysqli_query($data,"INSERT INTO student_reg (st_code,course_code,discount,amount,org_fee,batch_code,no_of_ins,reg_date,project,admit_officer)VALUES('$st_code','$course','$dis','$dised','$fee','$batch','$no_of_ins','$adm_date','$project','$officer')");
		if(!$sql){
			echo"There is an error in student registration!";
			exit();
		}
		else{
			$q2 = mysqli_fetch_array(mysqli_query($data,"SELECT MAX(CODE) as cod FROM student_reg"));
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
}
else{
	echo"NOT";
}	
?>