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
		<div class="container base" style="background-color:#CCC;border-radius:5px;padding:20px;">
			<?php if(isset($_GET['edit']) || isset($_GET['add'])){
				$hospital = ((isset($_POST['hospital']) && !empty($_POST['hospital']))?$_POST['hospital']:'');
				$area = ((isset($_POST['area']) && !empty($_POST['area']))?$_POST['area']:'');
				$mob = ((isset($_POST['mob']) && !empty($_POST['mob']))?$_POST['mob']:'');
				$email = ((isset($_POST['email']) && !empty($_POST['email']))?$_POST['email']:'');
				if(isset($_GET['edit'])){
					$code = $_GET['edit'];
					$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `hospital` WHERE CODE = '$code'"));
					$hospital = ((isset($_POST['hospital']) && !empty($_POST['hospital']))?$_POST['hospital']:$data['NAME']);
					$area = ((isset($_POST['area']) && !empty($_POST['area']))?$_POST['area']:$data['AREA']);
					$mob = ((isset($_POST['mob']) && !empty($_POST['mob']))?$_POST['mob']:$data['CONTACT_NUMBER']);
					$email = ((isset($_POST['email']) && !empty($_POST['email']))?$_POST['email']:$data['EMAIL']);
				}
				if(isset($_POST['hospital'])){
					if(isset($_GET['edit'])){
						$sql = mysqli_query($db, "UPDATE hospital SET NAME = '$hospital', AREA = '$area', CONTACT_NUMBER = '$mob', EMAIL = '$email' WHERE CODE = '$code'");
						header("Location:hospital.php?edit=".$code);
					}else{
						$sql = mysqli_query($db, "INSERT INTO hospital (NAME, AREA, CONTACT_NUMBER, EMAIL) VALUES ('$hospital','$area','$area','$email')");
						header("Location:hospital.php");
					}
				}
			?>
			<form action="hospital.php?<?=(isset($_GET['edit'])?'edit='.$_GET['edit']:'add=1');?>" method="post">
			  <div class="form-row">
				<div class="form-group col-md-6">
				  <label for="hospital">HOSPITAL</label>
				  <input type="text" name="hospital" class="form-control" value="<?=$hospital;?>" required="">
				</div>
				<div class="form-group col-md-6">
				  <label for="area">AREA</label>
				  <input type="text" name="area" class="form-control" value="<?=$area;?>" required="">
				</div>
				<div class="form-group col-md-6">
				  <label for="mob">Contact Number</label>
				  <input type="number" name="mob" class="form-control" value="<?=$mob;?>" required="">
				</div>
				<div class="form-group col-md-6">
				  <label for="email">Email</label>
				  <input type="email" name="email" class="form-control" value="<?=$email;?>" required="">
				</div>
			  </div>
			  <div class="form-group col-md-12">
				<button type="submit" class="btn btn-primary"><?=(isset($_GET['edit'])?'Edit':'Add');?></button>
			  </div>
			</form>
			<?php } else{ ?>
			<h3 class="text-center" style="padding:10px 0;">ALL HOSPITALS</h3>
			
			<a href="hospital.php?add=1" class="btn btn-info pull-right" style="margin:20px 0;">ADD HOSPITAL</a>
						
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th>Sr#</th>
					<th>HOSPITAL NAME</th>
					<th>AREA</th>
					<th>CONTACT NUMBER</th>
					<th>EMAIL</th>
					<th>UPDATE</th>
					<th>DELETE</th>
				  </tr>
				</thead>
				<tbody>
					<?php
						$SQuery = mysqli_query($db, "SELECT * FROM `hospital`");
						$cnt=0;
						while($s = mysqli_fetch_assoc($SQuery)){
						$cnt++;
					?>
						<tr>
							<td><?=$cnt;?></td>
							<td><?=$s['NAME'];?></td>
							<td><?=$s['AREA'];?></td>
							<td><?=$s['CONTACT_NUMBER'];?></td>
							<td><?=$s['EMAIL'];?></td>
							<td>
								<a href="hospital.php?edit=<?=$s['CODE'];?>" class="btn btn-info">UPDATE</a>
							</td>
							<td>
								<a href="hospital.php?del=<?=$s['CODE'];?>" class="btn btn-info">DELETE</a>
							</td>
						</tr>
						
					<?php } ?>
				</tbody>
			</table>
			<?php } ?>
		</div>
		
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery-ui.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/func.js"></script>
        <script src="assets/js/main.js"></script>
	</body>
</html>