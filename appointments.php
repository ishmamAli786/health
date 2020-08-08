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
		<?php if(isset($_GET['status']) && isset($_GET['app_code'])){
				$app_code = $_GET['app_code'];
				if($_GET['status'] == 0){
					mysqli_query($db, "UPDATE appointments SET STATUS = 1 WHERE CODE = '$app_code'");
					echo'<script>window.location.href="appointments.php";</script>';
					exit;
				}
				if(isset($_POST['app_date'])){
					
					$date = $_POST['app_date'];
					$sql = mysqli_query($db, "UPDATE appointments SET APPOINT_DATE = '$date', STATUS = 1 WHERE CODE = '$app_code'");
					header("Location:appointments.php");
				}elseif(isset($_POST['remarks'])){
					$med=$_POST['med'];
					$tests=$_POST['tests'];
					$remarks = mysqli_real_escape_string($db, $_POST['remarks']);
					$sql = mysqli_query($db, "UPDATE appointments SET REMARKS = '$remarks',med = '$med',tests = '$tests', STATUS = 2 WHERE CODE = '$app_code'");
					header("Location:appointments.php");
				}
		?>
		<style>
			label{
				color:#000;
			}
		</style>
		<div class="col-md-9" style="padding-top:20%;">
			<h2 style="color:#000;"><?=(isset($_GET['edit'])?'Edit':'Add');?> Appointments</h2>
			<form action="appointments.php?status=<?=$_GET['status'];?>&app_code=<?=$_GET['app_code'];?>" method="post">
			  <div class="form-row">
				<?php if($_GET['status'] == 0){ ?>
				<div class="form-group col-md-12">
				  <label for="app_date">APPOINTMENT DATE</label>
					<input type="date" name="app_date" class="form-control">
				</div>
				<?php }else if($_GET['status'] == 1){ ?>
				<div class="form-group col-md-12">
				  <label for="app_date">REMARKS ABOUT PATIENT</label>
					<textarea name="remarks" class="form-control"></textarea>
				</div>
				<div class="form-group col-md-12">
				  <label for="app_date">Medicines</label>
					<textarea name="med" class="form-control"></textarea>
				</div>
				<div class="form-group col-md-12">
				  <label for="app_date">TESTS</label>
					<textarea name="tests" class="form-control"></textarea>
				</div>
				<?php } ?>
			  </div>
			  <div class="form-group col-md-12">
				<button type="submit" class="btn btn-primary">Submit</button>
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
			<h2 style="color:#000;clear:both;">APPOINTMENTS</h2>
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th>Token No</th>
					<th>PATIENT</th>
					<th>CONTACT</th>
					<th>HOSPITAL</th>
					<th>APPOINTMENT DATE</th>
					<th>PROBLEM</th>
					<th>STATUS</th>
				  </tr>
				</thead>
				<tbody>
					<?php
						$user_code = $_SESSION['code'];
						$SQuery = mysqli_query($db, "SELECT * FROM `app_view` WHERE DOCTORS_CODE = '$user_code' AND APP_STATUS IN (0, 1) ORDER BY APPOINT_DATE");
						$rows = mysqli_num_rows($SQuery);
						if($rows > 0){
							$cnt=0;
							while($s = mysqli_fetch_assoc($SQuery)){
								$cnt++;
								if($cnt == 1){
									$date = $s['APPOINT_DATE'];
								}
								if($s['APPOINT_DATE'] != $date){
									$cnt=1;
									$date = $s['APPOINT_DATE'];
								}
								$patient = $s['PATIENTS_CODE'];
								$patient_data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `login` WHERE CODE = '$patient'"));
					?>
						<tr>
							<td><?=$cnt;?></td>
							<td><?=$patient_data['NAME'];?></td>
							<td><?=$patient_data['CONTACT_NUMBER'];?></td>
							<td><?=$s['HOSPITAL'];?></td>
							<td><?=$s['APPOINT_DATE'];?></td>
							<td><?=$s['PROBLEM'];?></td>
							<td>
								<?php if($s['APP_STATUS'] == 0){?>
									<a href="appointments.php?status=0&app_code=<?=$s['APP_CODE'];?>" class="btn btn-info">
										Accept
									</a>
								<?php }else if($s['APP_STATUS'] == 1){ ?>
									<a href="appointments.php?status=1&app_code=<?=$s['APP_CODE'];?>" class="btn btn-info">
										Pending
									</a>
								<?php }else{ ?>
									<button class="btn btn-success">
										Complete
									</button>
								<?php } ?>
							</td>
						</tr>
					<?php	
							}
						}else{ 
					?>
						<tr>
							<td colspan="6"><h3>THERE IS NO APPOINTMENT</h3></td>
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