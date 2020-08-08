<?php
if(isset($_POST['student_name'])){
	include_once("../data.php");
	$reg_code = substr($_POST['student_name'],-13,-1);
	$sql = mysqli_query($data,"SELECT REG.CODE,INS.CODE AS INS_CODE,INS.FEE_DATE,INS.REG_CODE,INS.AMOUNT FROM `student_reg` AS REG,FEE_REC AS INS WHERE REG.CODE=INS.REG_CODE AND REG.REG_CODE ='$reg_code'");
	$rows = mysqli_num_rows($sql);
	if($rows == 0){
		echo'
			<tr>
			  <td colspan="3"><h3 class="text-center">NO RECIEVING FOUND</h3></td>
			</tr>
		';
	}
	else{
		while($dat = mysqli_fetch_array($sql)){
			$code = $dat['CODE'];
			echo'
				<tr>
					<td>'.date("Y-M-d",strtotime($dat['FEE_DATE'])).'</td>
					<td>'.$dat['AMOUNT'].'</td>
					<td><button class="btn btn-info del_record" id="'.$dat['INS_CODE'].'">Delete</button></td>
				</tr>
			';
		}
	}
}
?>