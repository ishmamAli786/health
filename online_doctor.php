<?php  include"includes/dboard_header.php";?>
<?php  include"includes/dboard_sidebar.php";?>
<?php
if(isset($_POST['problem'])){
	$problem = mysqli_real_escape_string($db, $_POST['problem']);
	$schedule_code = $_POST['schedule_code'];
	$date = date('Y-m-d',strtotime($_POST['date']));
	$patient_code = $_SESSION['code'];
	$sQ = mysqli_fetch_assoc(mysqli_query($db, "SELECT NO_OF_APP FROM hospital_schedule WHERE CODE = '$schedule_code'"));
	$no_of_app = $sQ['NO_OF_APP'];
	$tQ = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) TOTAL FROM app_view WHERE SCHEDULE_CODE = '$schedule_code' AND APPOINT_DATE = '$date'"));
	$total_app = $tQ['TOTAL'];
	$remian = $no_of_app - $total_app;
	if($remian == 0){
		$_SESSION['error'] = 'APPOINTMENTS ALREADY BOOKED  ON THAT DATE '.$date.'!';
	}else{
		$sql = mysqli_query($db, "INSERT INTO appointments (HOSPITALS_SCHEDULE_CODE, PATIENTS_CODE, PROBLEM, APPOINT_DATE) VALUES ('$schedule_code', '$patient_code', '$problem', '$date')");
		if($sql){
			$_SESSION['success'] = 'YOUR APPOINTMENT HAS BEEN SENT TO DOCTOR!';
		}else{
			$_SESSION['error'] = 'THERE IS SOME ERRROR IN YOUR APPOINTMENT SENDING!';
		}
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
		
		<div class="col-md-9" style="padding-top:20%;">
			<div class="col-md-4">
				<h2 class="username"><?=(($_SESSION['type'] == 'doctor')?'Dr.':'');?> <?=ucwords($user['NAME']);?></h2>
			</div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<?php if(isset($_GET['schedule_code'])){?>
			<table class="table table-striped">
				<thead>
				  <tr>
					<th>DATE</th>
					<th>TIME</th>
					<th>TOTAL APPOINTMENTS</th>
					<th>REMIANING APPOINTMENTS</th>
				  </tr>
				</thead>
				<tbody>
					<?php
						$s_code = $_GET['schedule_code'];
						$sql = mysqli_query($db, "SELECT COUNT(*) FILL_APPOINTS, SCHEDULE_CODE, NO_OF_APP, APPOINT_DATE, TIME FROM app_view WHERE APPOINT_DATE > NOW() AND SCHEDULE_CODE = '$s_code' GROUP BY APPOINT_DATE");
						while($data = mysqli_fetch_assoc($sql)){
					?>
						<tr>
							<td><?=$data['APPOINT_DATE'];?></td>
							<td><?=$data['TIME'];?></td>
							<td><?=$data['NO_OF_APP'];?></td>
							<td><?=$data['NO_OF_APP']-$data['FILL_APPOINTS'];?></td>
						</tr>
					<?php
						}
					?>
				</tbody>
			  </table>
			<form action="online_doctor.php" method="post">
				<input type="hidden" name="schedule_code" value="<?=$_GET['schedule_code'];?>">
				<div class="form-group col-md-12">
					<label for="problem">APPOINTMENT DATE:</label>
					<input type="date" class="form-control" name="date" required="" min="<?=date('Y-m-d');?>">
				</div>
				<div class="form-group col-md-12">
					<label for="problem">PROBLEM DETAIL:</label>
					<textarea class="form-control" rows="10" name="problem" required=""></textarea>
				</div>
				<div class="form-group col-md-12">
					<button type="submit" class="btn btn-info">Submit</button>
				</div>
			</form>
			<?php } else {?>
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th>Sr#</th>
					<th>HOSPITAL</th>
					<th>DOCTOR</th>
					<th>SPECIALIST</th>
					<th>TIME</th>
					<th>DAYS</th>
					<th>FEE</th>
					<th>MANAGE</th>
				  </tr>
				</thead>
				<tbody>
					<?php
						$user_code = $_SESSION['code'];
						$SQuery = mysqli_query($db, "SELECT * FROM `hospital_and_schedule`");
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
							<td><?=$doctor_dtl['SP_NAME'];?></td>
							<td><?=$s['TIME'];?></td>
							<td><?=$s['DAYS'];?></td>
							<td><?=$s['FEE'];?></td>
							<td><a class="btn btn-info" href="online_doctor.php?schedule_code=<?=$s['SCHEDULE_CODE'];?>">Appointment</a></td>
						</tr>
						
					<?php } ?>
				</tbody>
			</table>
			<?php } ?>
		</div>
	</div>
</div>
<?php include("includes/dboard_footer.php");?>
<script>
	$("#profile_field").change(function(){
		$("#profile_pic").submit();
	});
</script>