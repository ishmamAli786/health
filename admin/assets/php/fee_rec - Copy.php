<?php
include_once("data.php");
if(isset($_POST['student_name'])){
	$ins_total = 0;
	$rec_total = 0;
	$reg_code = substr(trim($_POST['student_name']),-13,-1);
	$q = mysqli_fetch_array(mysqli_query($data,"SELECT CODE FROM STUDENT_REG WHERE REG_CODE='$reg_code'"));
	$reg_student = $q['CODE'];
	$sql = mysqli_query($data,"SELECT RR.REGCODE,RR.INS_DATE,SUM(RR.INS_AMOUNT) INS_AMOUNT,SUM(RR.AMOUNT) REC_AMOUNT
FROM (
    SELECT REGCODE,INS_DATE,INS_AMOUNT,0 AMOUNT
FROM v_student_info
UNION ALL
SELECT REG_CODE,FEE_DATE,0,AMOUNT
FROM FEE_REC 
) RR
WHERE RR.REGCODE='$reg_student'
GROUP BY RR.REGCODE,RR.INS_DATE");
	if(!$sql){
		echo"ERROR";
	}
	else{
		echo'<table class="table table-striped" style="margin-top:70px;">
              <thead>
                <tr>
                  <th>REG_CODE</th>
                  <th>INS_DATE</th>
                  <th>INS_AMOUNT</th>
				  <th>REC_AMOUNT</th>
                </tr>
              </thead>
              <tbody>';
			  $idate=array();
			  $rdate=array();
			  $dan = array();
				$c = 0;
			$pu = array();
		while($rec = mysqli_fetch_array($sql)){
			$ins_total += $rec['INS_AMOUNT'];
			$rec_total += $rec['REC_AMOUNT'];
			
			if($rec['INS_AMOUNT'] > 0){
				array_push($idate,$rec['INS_DATE']);
				$pu = array($rec['INS_DATE'] => $rec['INS_AMOUNT']);
				array_push($dan,$pu);
				$c +=1;
			}
			if($rec['REC_AMOUNT'] > 0){
					array_push($rdate,$rec['INS_DATE']);
				}

		/*		
			if(date("Y-m-d", strtotime("-11 days")) > $rec['INS_DATE'] && $rec['INS_AMOUNT'] == 0){
				echo "late";
			}
			else if(date("Y-m-d", strtotime("-11 days")) <= $rec['INS_DATE'] && $rec['INS_AMOUNT'] == 0){
				echo "in time";		
			}
		*/
			echo'
                <tr>
                  <td>'.$rec['REGCODE'].'</td>
                  <td>'.$rec['INS_DATE'].'</td>
                  <td>'.$rec['INS_AMOUNT'].'</td>
				  <td>'.$rec['REC_AMOUNT'].'</td>
                </tr>';
				
		}
	
		echo'
		<tr>
			<td colspan="3" style="padding-left:55%;">'.$ins_total.'</td>
			<td>'.$rec_total.'</td>
		</tr>
		</tbody>
            </table>';
				$feesum=0;
				$status = false;
				//print_r($idate);echo "<br>";
				//print_r($rdate);echo "<br>";
				//print_r($dan);
				echo "<br>";echo "<br>";echo "<br>";//echo "<br>OK<br>";
				
				foreach($dan as $abc){
					if ($status){
						break;
					}
					foreach ($abc as $dat => $pay ){
						//echo round(abs(strtotime(date("Y-m-d")) - strtotime($dat))/86400);
						
						//echo"<pre>";
						$feesum+=$pay;
						//echo $dat.' => '.$feesum."<br><br>";
						//echo $feesum."------".$rec_total;
						// feesum is instammlent sum and rec_total is Recevied payments total
						
						
						//($dat >= (date("Y-m-d"))) AND
						
						//find pending installment
							if(($feesum > $rec_total)){
								
									//find installment	
									if($dat >= (date("Y-m-d"))){
										$status = true;
										echo "<br>".$dat."----this installment ".($feesum-$rec_total);
									}else {
										//find next pending installment
										echo "<br>".$dat."----Processing more pending Installments";
									}
										
										//if fee clear than echo next fee date and amount
								}
								elseif($feesum == $rec_total and $dat >= (date("Y-m-d"))){
										echo "<h2>Fee clear<br> Payable Fee till <b>".$dat."</b> is <b>".$feesum."</b> <br>received ".$rec_total."</h2>";
											$status = true;
									}
					}
					//last installment date and fee status
						
				}
					if( ($dat <= (date("Y-m-d"))) AND $feesum > $rec_total){
							echo "<br>".$dat."----Installments date passed but this fee Pending ".($feesum-$rec_total);;
						}else{
							echo "";
						}
	}
}
//echo "ins date=".$dat."currrent date=".(date("Y-m-d", strtotime("+0 days")))."installment date so far".($feesum-$rec_total)."<br>";
//	echo "ins date=".$dat."currrent date=".(date("Y-m-d", strtotime("+0 days")))."Installments dues Pending".($feesum-$rec_total)."<br>";


?>