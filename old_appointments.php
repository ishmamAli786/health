<?php  include"includes/dboard_header.php";?>
<?php  include"includes/dboard_sidebar.php";?>
<?php
	$search='';
	$name='';
	if(isset($_GET['search']) && !empty($_GET['search'])){
		$name = $_GET['search'];
		$user_code = $_SESSION['code'];
		$searchQ = mysqli_query($db, "SELECT * FROM `login` WHERE NAME = '$name' AND TYPE = 'patient'");
		$search_rows = mysqli_num_rows($searchQ);
		if($search_rows > 0){
			$patient_data = mysqli_fetch_assoc($searchQ);
			$patient_code = $patient_data['CODE'];
			$search_patientQ = mysqli_query($db, "SELECT * FROM `app_view` WHERE DOCTORS_CODE = '$user_code' AND APP_STATUS = 2 AND PATIENTS_CODE = '$patient_code'");
			$search_patient_rows = mysqli_num_rows($search_patientQ);
			if($search_patient_rows > 0){
				$search = ' AND PATIENTS_CODE = '.$patient_code;
			}else{
				$search = ' AND PATIENTS_CODE = NULL';
			}
		}else{
			$search = ' AND PATIENTS_CODE = NULL';
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
		<div class="col-md-9" style="padding-top:20%;">
			<div class="col-md-4">
				<h2 class="username">Dr. <?=ucwords($user['NAME']);?></h2>
			</div>
			<div class="col-md-8">
				
			</div>
		</div>
		<div class="col-md-6">
			<h2 style="color:#000;margin-top:30px;">Old APPOINTMENTS</h2>
		</div>	
		<div class="col-md-12">
			<form action="old_appointments.php" class="form-inline pull-right">
			  <div class="form-group">
				<label for="name" style="color:#000;">Patient Name:</label>
				<input type="text" name="search" class="form-control" id="name" value="<?=$name;?>">
			  </div>
			  <button type="submit" class="btn btn-default">Search</button>
			</form>
		</div>
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th>Sr#</th>
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
						$SQuery = mysqli_query($db, "SELECT * FROM `app_view` WHERE DOCTORS_CODE = '$user_code' AND APP_STATUS = 2".$search);
						$rows = mysqli_num_rows($SQuery);
						if($rows > 0){
							$cnt=0;
							while($s = mysqli_fetch_assoc($SQuery)){
								$cnt++;
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
	</div>
</div>
<?php include("includes/dboard_footer.php");?>
<script>
	$("#profile_field").change(function(){
		$("#profile_pic").submit();
	});
</script>