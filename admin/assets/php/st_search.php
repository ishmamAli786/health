<?php
include_once("data.php");

if(isset($_GET['term'])){
$term = str_replace("+"," ",$_GET['term']);
$ar = array();
$sql = mysqli_query($data,"SELECT mst.name,reg.reg_code as reg_course,mst.code FROM student_mst as mst,student_reg as reg WHERE mst.code = reg.st_code AND mst.name LIKE '%$term%' LIMIT 10");
	while($data = mysqli_fetch_array($sql)){
		$ar_row ["label"] = ucwords($data['name']).'  ('.$data['reg_course'].')';
		$ar_row ["value"] = ucwords($data['name']).'  ('.$data['reg_course'].')';
		array_push($ar,$ar_row);
	}
	echo json_encode($ar);
	flush();
}

?>