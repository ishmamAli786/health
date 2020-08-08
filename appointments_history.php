<?php  include"includes/dboard_header.php";?>
<?php  include"includes/dboard_sidebar.php";?>
<?php
if(isset($_FILES['report_file']['name'])){
	$ex = pathinfo($_FILES['report_file']['name'], PATHINFO_EXTENSION);
	$name = md5(time()).'.'.$ex;
	$report_code = $_POST['report_code'];
	$sql = mysqli_query($db, "UPDATE appointments SET REPORT = '$name', APPOINT_DATE = NOW() WHERE CODE = '$report_code'");
	if($sql){
		$_SESSION['success'] = 'YOUR REPORT HAS BEEN SENT TO DOCTOR!';
		move_uploaded_file($_FILES['report_file']['tmp_name'], 'reports/'.$name);
		echo'<script>window.location.href="appointments_history.php";</script>';exit;
	}else{
		$_SESSION['error'] = 'THERE IS SOME ERRROR IN YOUR REPORT SENDING!';
	}
}
if(isset($_POST['problem'])){
	$problem = mysqli_real_escape_string($db, $_POST['problem']);
	$schedule_code = $_POST['schedule_code'];
	$patient_code = $_SESSION['code'];
	$sql = mysqli_query($db, "INSERT INTO appointments (HOSPITALS_SCHEDULE_CODE, PATIENTS_CODE, PROBLEM) VALUES ('$schedule_code', '$patient_code', '$problem')");
	if($sql){
		$_SESSION['success'] = 'YOUR APPOINTMENT HAS BEEN SENT TO DOCTOR!';
	}else{
		$_SESSION['error'] = 'THERE IS SOME ERRROR IN YOUR APPOINTMENT SENDING!';
	}
}
?>
<style>
td,th{
	color:#000;
	font-size:12px;
}
label{
	color:#000;
}
</style>
<div id="profile" class="col-md-10">
	<div class="container-fluid">
		<div style="margin-top:20px;">
			<?php include("includes/msg.php"); ?>
		</div>
		<div class="col-md-3" style="padding-top:5%;">	
			<img  id="docimg" src="images/users/<?=(!empty($user['IMG'])?$user['IMG']:'default_user.jpg')?>" class="img-responsive" />
			<p style="color:#000;font-size:12px;padding:5px 0;text-align:center;">picture must be square</p>
			<form action="" method="post" id="profile_pic" enctype="multipart/form-data">
				<div id="edit_pic">
				<input type="file" name="profile_pic" id="profile_field" class="form-controls">
				<a href="profile.php?edit=picture" class="btn btn-info" id="pic_btn">Edit Picture</a>
				</div>
			</form>
		</div>
		
		<div class="col-md-12" style="padding-top:5%;">
			<div class="row">
				<div class="col-md-4">
					<h2 class="username"><?=(($_SESSION['type'] == 'doctor')?'Dr.':'');?> <?=ucwords($user['NAME']);?></h2>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
			</div>
			<div class="row">
				<div class="col-md-12">
				
					<table style="padding-right:20%" class="table table-bordered table-responsive-md">
						<thead>
						  <tr>
							<th>Sr#</th>
							<th>HOSPITAL</th>
							<th>DOCTOR</th>
							<th>TIME</th>
							<th>DAYS</th>
							<th>FEE</th>
							<th>REMARKS</th>
							<th>MEDICINES</th>
							<th>TEST</th>
							<th>STATUS</th>
							<th>REPORT</th>
							<th>Rx PRINT</th>
							
						  </tr>
						</thead>
						<tbody>
							<?php
								$user_code = $_SESSION['code'];
								$SQuery = mysqli_query($db, "SELECT * FROM `app_view` WHERE PATIENTS_CODE = '$user_code'");
								$rows = mysqli_num_rows($SQuery);
								$cnt=0;
								while($s = mysqli_fetch_assoc($SQuery)){
									$cnt++;
								$doctor_code = $s['DOCTORS_CODE'];
								$doctor_dtl = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `doctor_view` WHERE DOCTOR_CODE = '$doctor_code'"));
							?>
								<tr>
									<td><?=$cnt;?></td>
									<td><?=$s['HOSPITAL'];?></td>
									<td><?=$doctor_dtl['NAME'];?></td>
									<td><?=$s['TIME'];?></td>
									<td><?=$s['DAYS'];?></td>
									<td><?=$s['FEE'];?></td>
									<td><?=$s['REMARKS'];?></td>
									<td><?=$s['med'];?></td>
									<td><?=$s['tests'];?></td>
								
									<td>
										
										<?php if($s['APP_STATUS'] == 0){?>
											<button class="btn btn-warning">Wait</button>
										<?php }else if($s['APP_STATUS'] == 1){ ?>
											<button class="btn btn-info">Accepted</button>
										<?php }else{ ?>
											<button class="btn btn-success">Complete</button>
										<?php } ?>
									</td>
									<td>
										<?php if(empty($s['REPORT'])){ ?>
										<form action="appointments_history.php" method="post" enctype="multipart/form-data" class="report_form">
											<div id="edit_pic" style="margin-top:0;">
											<input type="file" style="top:0;" name="report_file" class="upload_report form-controls">
											<input type="hidden" value="<?=$s['APP_CODE'];?>" name="report_code">
											
											<a href="profile.php?edit=picture" style="padding:0;" class="btn btn-info" id="pic_btn">Upload</a>
											</div>
										</form>
										<?php }else{ ?>
										<a href="reports/<?=$s['REPORT'];?>" target="_blank" class="btn btn-info">Print</a>
										<?php } ?>
									</td>
									<td><a class="btn btn-warning" href="doctab/doctab.php?appcode=<?=$s['APP_CODE'];?>">Print</a></td>
								</tr>
								
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("includes/dboard_footer.php");?>
<script>
	$("#profile_field").change(function(){
		$("#profile_pic").submit();
	});
	$(".upload_report").change(function(){
		$(this).parent().parent().submit();
	});
</script>