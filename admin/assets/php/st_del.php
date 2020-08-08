<?php
if(isset($_POST['reg_code']) && isset($_POST['st_code'])){
	include_once("data.php");
	$st_code = $_POST['st_code'];
	$reg_code = $_POST['reg_code'];
	// delete from student_ins table
	mysqli_query($data,"DELETE FROM student_ins WHERE reg_code='$reg_code'");
	mysqli_query($data,"DELETE FROM student_reg WHERE code='$reg_code'");
	mysqli_query($data,"DELETE FROM student_mst WHERE code='$st_code'");
	
}
?>