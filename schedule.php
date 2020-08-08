<?php  include"includes/dboard_header.php";?>
<?php  include"includes/dboard_sidebar.php";?>
<?php
if(isset($_POST['Speciality'])){
	$cs ='';
	$Speciality = $_POST['Speciality'];
	$consult_source = $_POST['consult_source'];
	foreach($consult_source as $ctemp){
		$cs .=$ctemp.',';
	}
	$cs = rtrim($cs, ',');
	$BACKGROUND = mysqli_real_escape_string($db, $_POST['BACKGROUND']);
	$user_code = $_SESSION['code'];
	$sql = mysqli_query($db, "UPDATE doctor_detail SET SPECIALIZATION_CODE = '$Speciality', BACKGROUND = '$BACKGROUND', CONSULT_TYPE = '$cs' WHERE DOCTORS_CODE = '$user_code'");
	if($sql){
		$_SESSION['success'] = 'PROFILE SUCCESSFULLY UPDATED!';
		//header("Location:profile.php");
	}
	else{
		$_SESSION['error'] = 'THERE IS SOME ERROR IN  UPDATING PROFILE!';
		//header("Location:profile.php?edit=profile");
	}
}
?>
<style>
td,th{
	color:#000;
	font-size:12px;
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
		<?php if(isset($_GET['edit']) || isset($_GET['add'])){
			$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Satureday", "Sunday");
			$hospital = ((isset($_POST['hospital']) && !empty($_POST['hospital']))?test_input($_POST['hospital']):'');
			$fday = ((isset($_POST['fday']) && !empty($_POST['fday']))?test_input($_POST['fday']):'');
			$tday = ((isset($_POST['tday']) && !empty($_POST['tday']))?test_input($_POST['tday']):'');
			$ftime = ((isset($_POST['ftime']) && !empty($_POST['ftime']))?test_input($_POST['ftime']):'');
			$ttime = ((isset($_POST['ttime']) && !empty($_POST['ttime']))?test_input($_POST['ttime']):'');
			$fee = ((isset($_POST['fee']) && !empty($_POST['fee']))?test_input($_POST['fee']):'');
			$no_app = ((isset($_POST['no_app']) && !empty($_POST['no_app']))?test_input($_POST['no_app']):'');
			if(isset($_GET['edit'])){
				$schedule_code = $_GET['edit'];
				$schedule = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM hospital_schedule WHERE CODE = '$schedule_code'"));
				$days_array = explode("  ",str_replace("TO", "", $schedule['DAYS']));
				$times_array = explode("  ",str_replace("TO", "", $schedule['TIME']));
				//print_r($times_array);exit;
				$hospital = ((isset($_POST['hospital']) && !empty($_POST['hospital']))?test_input($_POST['hospital']):$schedule['HOSPITALS_CODE']);
				$fday = ((isset($_POST['fday']) && !empty($_POST['fday']))?test_input($_POST['fday']):$days_array[0]);
				$tday = ((isset($_POST['tday']) && !empty($_POST['tday']))?test_input($_POST['tday']):$days_array[1]);
				$ftime = ((isset($_POST['ftime']) && !empty($_POST['ftime']))?test_input($_POST['ftime']):$times_array[0]);
				$ttime = ((isset($_POST['ttime']) && !empty($_POST['ttime']))?test_input($_POST['ttime']):$times_array[1]);
				$fee = ((isset($_POST['fee']) && !empty($_POST['fee']))?test_input($_POST['fee']):$schedule['FEE']);
				$no_app = ((isset($_POST['no_app']) && !empty($_POST['no_app']))?test_input($_POST['no_app']):$schedule['NO_OF_APP']);
			}
			if(isset($_POST['ftime'])){
				$time = $ftime.' TO '.$ttime;
				$days = $fday.' TO '.$tday;
				$user_code = $_SESSION['code'];
				if($_GET['edit']){
					$sql = mysqli_query($db, "UPDATE hospital_schedule SET HOSPITALS_CODE = '$hospital', TIME = '$time', DAYS = '$days', FEE = '$fee', NO_OF_APP = '$no_app' WHERE CODE = '$schedule_code'");
					$msg = 'SCHEDULE SUCCESSFULLY UPDATED!';
				}else{
					$sql = mysqli_query($db, "INSERT INTO hospital_schedule (HOSPITALS_CODE, DOCTORS_CODE, TIME, DAYS, FEE,NO_OF_APP) VALUES ('$hospital', '$user_code', '$time', '$days', '$fee','$no_app')");
					$msg = 'SCHEDULE SUCCESSFULLY ADDED!';
				}
				if($sql){
					$_SESSION['success'] = $msg;
					header("Location:schedule.php");
					
				}
				else{
					$_SESSION['error'] = 'THERE IS SOME ERROR IN DATABASE!';
				}
			}
		?>
		<style>
			label{
				color:#000;
			}
		</style>
		<div class="col-md-9" style="padding-top:20%;">
			<h2 style="color:#000;"><?=(isset($_GET['edit'])?'Edit':'Add');?> Schedule</h2>
			<form action="schedule.php?<?=(isset($_GET['edit'])?'edit='.$_GET['edit']:'add=1');?>" method="post">
			  <div class="form-row">
				<div class="form-group col-md-12">
				  <label for="hospital">HOSPITAL</label>
				  <select class="form-control" id="hospital" name="hospital">
					<?php
						$SQ = mysqli_query($db, "SELECT * FROM `hospital`");
						while($sp = mysqli_fetch_assoc($SQ)){
					?>
					<option value="<?=$sp['CODE'];?>" <?=(($sp['CODE'] == $hospital)?'selected':'');?>><?=$sp['NAME'];?></option>
					<?php } ?>
				  <select>
				</div>
				<div class="form-group col-md-6">
				  <label for="ftime">Start Time</label>
				  <select class="form-control" name="ftime">
					<?php
						$count=0;
						for($a=1;$a<=24;$a++){
							$count++;
							if($a < 12){
							
					?>
						<option value="<?=sprintf("%02d", $count);?>:00 AM" <?=((sprintf("%02d", $count).':00 AM' == $ftime)?'selected':'');?>><?=sprintf("%02d", $count);?> AM</option>
					<?php
							}else{
					?>
							<option value="<?=sprintf("%02d", $count);?>:00 PM" <?=((sprintf("%02d", $count).':00 PM' == $ftime)?'selected':'');?>><?=sprintf("%02d", $count);?> PM</option>
					<?php
							}
							if($a ==12){$count=0;}
						}
					?>
				  </select>
				</div>
				<div class="form-group col-md-6">
				  <label for="ttime">Close Time</label>
				  <select class="form-control" name="ttime">
					<?php
						$count=0;
						for($a=1;$a<=24;$a++){
							$count++;
							if($a < 12){
							
					?>
						<option value="<?=sprintf("%02d", $count);?>:00 AM" <?=((sprintf("%02d", $count).':00 AM' == $ttime)?'selected':'');?>><?=sprintf("%02d", $count);?> AM</option>
					<?php
							}else{
					?>
							<option value="<?=sprintf("%02d", $count);?>:00 PM" <?=((sprintf("%02d", $count).':00 PM' == $ttime)?'selected':'');?>><?=sprintf("%02d", $count);?> PM</option>
					<?php
							}
							if($a ==12){$count=0;}
						}
					?>
				  </select>
				</div>
				<div class="form-group col-md-6">
					<label for="fday">Start Day</label>
					<select class="form-control" name="fday">
						<?php
							foreach($days as $day){
						?>
							<option value="<?=$day;?>" <?=(($day == $fday)?'selected':'');?>><?=$day;?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="tday">Close Day</label>
					<select class="form-control" name="tday">
						<?php
							foreach($days as $day){
						?>
							<option value="<?=$day;?>" <?=(($day == $tday)?'selected':'');?>><?=$day;?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div class="form-group col-md-12">
					<label for="fee">FEE</label>
					<input type="number" name="fee" class="form-control" value="<?=$fee;?>">
				</div>
				<div class="form-group col-md-12">
					<label for="fee">NO. OF APPOINTMENTS</label>
					<input type="number" name="no_app" class="form-control" value="<?=$no_app;?>">
				</div>
			  </div>
			  <div class="form-group col-md-12">
				<button type="submit" class="btn btn-primary"><?=(isset($_GET['edit'])?'Edit':'Add');?></button>
			  </div>
			</form>
		</div>
		<?php }else{?>
		<div class="col-md-9" style="padding-top:20%;">
			<div class="col-md-4">
				<h2 class="username">Dr. <?=ucwords($user['NAME']);?></h2>
			</div>
			<div class="col-md-4"></div>
			<div class="col-md-4">
				
			</div>
			<h2 style="color:#000;clear:both;">Schedules</h2>
			<a href="schedule.php?add=1" class="btn btn-info pull-right" style="margin:10px 0;">Add Schedule</a>
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th>Sr#</th>
					<th>HOSPITAL</th>
					<th>TIME</th>
					<th>DAYS</th>
					<th>FEE</th>
					<th>NO. OF APPOINTMENTS</th>
					<th>EDIT</th>
				  </tr>
				</thead>
				<tbody>
					<?php
						$user_code = $_SESSION['code'];
						$SQuery = mysqli_query($db, "SELECT * FROM `hospital_and_schedule` WHERE DOCTORS_CODE = '$user_code'");
						$rows = mysqli_num_rows($SQuery);
						if($rows > 0){
							$cnt=0;
							while($s = mysqli_fetch_assoc($SQuery)){
								$cnt++;
					?>
						<tr>
							<td><?=$cnt;?></td>
							<td><?=$s['HOSPITAL'];?></td>
							<td><?=$s['TIME'];?></td>
							<td><?=$s['DAYS'];?></td>
							<td><?=$s['FEE'];?></td>
							<td><?=$s['NO_OF_APP'];?></td>
							<td><a href="schedule.php?edit=<?=$s['SCHEDULE_CODE'];?>">Edit</a></td>
						</tr>
					<?php 
							}
						}else{ 
					?>
						<tr>
							<td colspan="6"><h3>THERE IS NO SCHEDULE PLEASE <a href="schedule.php?add=1">ADD</a></h3></td>
						</tr>	
					<?php } ?>
				</tbody>
			</table>
		</div>
		<?php }?>
	</div>
</div>
<?php include("includes/dboard_footer.php");?>
<script>
	$("#profile_field").change(function(){
		$("#profile_pic").submit();
	});
</script>