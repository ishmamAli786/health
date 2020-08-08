<?php
if(isset($_POST['student_name'])){
	include_once("../data.php");
	$reg_code = substr($_POST['student_name'],-13,-1);
	$sql = mysqli_query($data,"SELECT REG.CODE,INS.CODE AS INS_CODE,INS.FEE_DATE,INS.REG_CODE,INS.AMOUNT FROM `student_reg` AS REG,FEE_REC AS INS WHERE REG.CODE=INS.REG_CODE AND REG.REG_CODE ='$reg_code'");
	$rows = mysqli_num_rows($sql);
	if($rows == 0){
		echo'
			<div class="well">
            	<h2 class="text-center">No Recieving Yet!</h2>
            <div>
		';
	}
	else{
		while($dat = mysqli_fetch_array($sql)){
			$code = $dat['CODE'];
			echo'
				<div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control up_date dat" value="'.date("Y-M-d",strtotime($dat['FEE_DATE'])).'">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control up_amount" value="'.$dat['AMOUNT'].'">
                    </div>
                </div>
				<input type="hidden" value="'.$dat['INS_CODE'].'" class="ids">
			';
		}
		echo'
			<div class="col-sm-12">
				<input type="hidden" value="'.$code.'" id="code">
				<button class="btn btn-info" id="fee_update_bnt" style="display:block;margin:20px auto;">Update</button>
			</div>
		';
	}
}
?>