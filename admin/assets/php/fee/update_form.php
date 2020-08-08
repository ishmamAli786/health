<?php
	if(isset($_POST['ins']) && isset($_POST['dat']) && isset($_POST['code']) && isset($_POST['ids']) && isset($_POST['rept_no'])){
		include_once("../data.php");
		$code = $_POST['code'];
		$ins = $_POST['ins'];
		$dat = $_POST['dat'];
		$ids = $_POST['ids'];
		$rept_no = $_POST['rept_no'];
		// date("Y-m-d",strtotime($dat[0]));
		
		for($a=0;$a<count($dat);$a++){
			$date = date("Y-m-d",strtotime($dat[$a]));
			$inst = $ins[$a];
			$id = $ids[$a];
			$rpt_no = $rept_no[$a];
			$sql = mysqli_query($data,"UPDATE FEE_REC SET FEE_DATE='$date',AMOUNT='$inst',RECIEPT_NO='$rpt_no' WHERE CODE='$id' AND REG_CODE='$code'");
			if($sql){$msg="OK";}
			else{$msg="ERROR";}
		}
		echo $msg;	
	}







?>