<?php
include("config/int.php");
if(!isset($_SESSION['name'])){
	header("location:login.php");	
}
?>		
<!DOCTYPE html>
<html>
	<head>
		<title>ADMIN PANEL</title>
		<link rel="stylesheet" href="assets/css/bootstrap-style.css">
		<link rel="stylesheet" href="assets/css/startups.css">
		<link rel="stylesheet" href="assets/css/jquery-ui.min.css">
	</head>
	<body>
    <div id="screen"><img src="assets/img/reload.gif" /></div>
    <div id="screen_msg"><a href="#" id="ref">x</a><a href="#" id="error">x</a><h3></h3></div>
		<?php include_once("includes/header.php");?>
		<!-- student basic information -->
		<div class="container base" style="background-color:#CCC;border-radius:5px;">
			<h3 class="text-center" style="padding:10px 0;">All Appointments</h3>
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th>Sr#</th>
					<th>HOSPITAL</th>
					<th>DOCTOR</th>
					<th>SPECIALIST</th>
					<th>PATIENT NAME</th>
					<th>TIME</th>
					<th>DAYS</th>
					<th>FEE</th>
					<th>STATUS</th>
				  </tr>
				</thead>
				<tbody>
					<?php
						$SQuery = mysqli_query($db, "SELECT * FROM `app_view`");
						$rows = mysqli_num_rows($SQuery);
						$cnt=0;
						while($s = mysqli_fetch_assoc($SQuery)){
							$cnt++;
						$doctor_code = $s['DOCTORS_CODE'];
						$patient_code = $s['PATIENTS_CODE'];
						$doctor_dtl = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `doctor_view` WHERE DOCTOR_CODE = '$doctor_code'"));
						$patient_dtl = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `login` WHERE CODE = '$patient_code'"));
					?>
						<tr>
							<td><?=$cnt;?></td>
							<td><?=$s['HOSPITAL'];?></td>
							<td><?=$doctor_dtl['NAME'];?></td>
							<td><?=$doctor_dtl['SP_NAME'];?></td>
							<td><?=$patient_dtl['NAME'];?></td>
							<td><?=$s['TIME'];?></td>
							<td><?=$s['DAYS'];?></td>
							<td><?=$s['FEE'];?></td>
							<td>
								
								<?php if($s['APP_STATUS'] == 0){?>
									<button class="btn btn-warning">Wait</button>
								<?php }else if($s['APP_STATUS'] == 1){ ?>
									<button class="btn btn-info">Accepted</button>
								<?php }else{ ?>
									<button class="btn btn-success">Complete</button>
								<?php } ?>
							</td>
						</tr>
						
					<?php } ?>
				</tbody>
			</table>
		</div>
		
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery-ui.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/func.js"></script>
        <script src="assets/js/main.js"></script>
	</body>
</html>