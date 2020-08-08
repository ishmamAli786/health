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
		header("Location:profile.php");
	}
	else{
		$_SESSION['error'] = 'THERE IS SOME ERROR IN  UPDATING PROFILE!';
		header("Location:profile.php?edit=profile");
	}
}
?>
<style>
td,th{
	color:#000;
	border:none !important;
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
		<?php if(@$_GET['edit'] == "profile"){?>
		<style>
			label{
				color:#000;
			}
		</style>
		<div class="col-md-9" style="padding-top:20%;">
			<h2 style="color:#000;">Edit Profile</h2>
			<form action="profile.php" method="post">
			  <div class="form-row">
				<div class="form-group col-md-6">
				  <label for="Speciality">Speciality</label>
				  <select class="form-control" id="Speciality" name="Speciality" placeholder="Speciality">
					<?php
						$SQ = mysqli_query($db, "SELECT * FROM `specialization`");
						while($sp = mysqli_fetch_assoc($SQ)){
					?>
					<option value="<?=$sp['CODE'];?>" <?=(($sp['NAME'] == $user['SP_NAME'])?'selected':'');?>><?=$sp['NAME'];?></option>
					<?php } ?>
				  <select>
				</div>
				<div class="form-group col-md-6">
				  <label for="consult_source">Consultant Type</label>
				  <?php
					$ct = explode(',', $user['CONSULT_TYPE']);
				  ?>
				  <br/>
				  <label class="checkbox-inline">
					<input type="checkbox" <?=(in_array("Video", $ct)?'checked':'');?> name="consult_source[]" value="Video">
					Video
				  </label>
				  <label class="checkbox-inline">
					<input type="checkbox" <?=(in_array("Audio", $ct)?'checked':'');?> name="consult_source[]" value="Audio">
					Audio
				  </label>
                  <label class="checkbox-inline">
					<input type="checkbox" <?=(in_array("in Person", $ct)?'checked':'');?> name="consult_source[]" value="in Person">
					In Person
				  </label>
				</div>
				<div class="form-group col-md-12">
				  <label for="BACKGROUND">BACKGROUND</label><br>
				  <textarea name="BACKGROUND" class="form-control" rows="10"><?=$user['BACKGROUND'];?></textarea>
				</div>
			  </div>
			  <div class="form-group col-md-12">
				<button type="submit" class="btn btn-primary">Edit</button>
			  </div>
			</form>
		</div>
		<?php }else{?>
		<div class="col-md-9" style="padding-top:20%;">
			<div class="col-md-4">
				<h2 class="username"><?=(($_SESSION['type'] == 'doctor')?'Dr.':'');?> <?=ucwords($user['NAME']);?></h2>
			</div>
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<?php
					if($_SESSION['type'] == 'doctor'){
				?>
				<h2>
				<a href="profile.php?edit=profile" class="btn btn-info edit_btn">
					<span class="glyphicon glyphicon-pencil"></span> Edit
				</a>
				</h2>
				<?php } ?>
			</div>
			<?php
					if($_SESSION['type'] == 'doctor'){
			?>
			<table class="table table-borderless">
				<thead>
				  <tr>
					<th>Speciality</th>
					<th>Consultant Type</th>
					<th>Email</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td><?=$user['SP_NAME'];?></td>
					<td><?=$user['CONSULT_TYPE'];?></td>
					<td><?=$user['EMAIL'];?></td>
				  </tr>
				  <tr>
					<th>BACKGROUND</th>
				  </tr>
				  <tr>
						<td colspan="3"><?=$user['BACKGROUND'];?></td>
				  </tr>
				</tbody>
			</table>
			<?php } ?>
			<?php
					if($_SESSION['type'] == 'patient'){
			?>
			<table class="table table-borderless">
				<thead>
				  <tr>
					<th>CNIC</th>
					<td><?=$user['CNIC'];?></td>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<th>STATUS</th>
					<td><?=$user['TYPE'];?></td>
				  </tr>
				  <tr>
				  
					<th>Email</th>
					<td><?=$user['EMAIL'];?></td>
				  </tr>
				</tbody>
			</table>
			<?php } ?>
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