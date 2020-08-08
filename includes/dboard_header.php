<?php
include("config/int.php");
$file_name = pathinfo($_SERVER["REQUEST_URI"], PATHINFO_FILENAME);
if(!isset($_SESSION['code']) || !isset($_SESSION['type'])){
	header("Location:index.php");
}
if(isset($_POST['mob'])){
	$user_code = $_SESSION['code'];
	$name = $_POST['name'];
	$fname = $_POST['fname'];
	$mob = $_POST['mob'];
	$npass = password_hash(test_input($_POST['npass']), PASSWORD_BCRYPT);
	$sql = mysqli_query($db, "UPDATE login SET NAME = '$name', FATHER_NAME = '$fname', CONTACT_NUMBER = '$mob', PASSWORD = '$npass' WHERE CODE = '$user_code'");
	if($sql){
		$_SESSION['success'] ='YOUR ACCOUNT SUCCESSFULLY UPDATED!';
	}
	else{
		$_SESSION['error'] ='THERE IS SOME ERROR IN UPDATING!!';
	}
}
if(isset($_FILES['profile_pic'])){
	$ex = pathinfo($_FILES['profile_pic']['name'],PATHINFO_EXTENSION);
	$name = md5(time()).'.'.$ex;
	list($width, $height) = getimagesize($_FILES['profile_pic']['tmp_name']);
	if($width != $height){
		$_SESSION['error']='PICTURE IS NOT SQUARE!';
	}
	else if ($_FILES['profile_pic']['size'] < 49500){
		$_SESSION['error']='PICTURE IS SMALL! MINIMUM SIZE 600px X 600px';
	}
	else{
		$user_code = $_SESSION['code'];
		$user_data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM login WHERE CODE = '$user_code'"));
		$sql = mysqli_query($db, "UPDATE login SET IMG = '$name' WHERE CODE = '$user_code'");
		if($sql){
			if(!empty($user_data['IMG'])){
				unlink('images/users/'.$user_data['IMG']);
			}
			move_uploaded_file($_FILES['profile_pic']['tmp_name'], 'images/users/'.$name);
		}else{
				$_SESSION['error']='THER IS SOME ERROR IN PICTURE UPLOADING!';
		}
	}
	
}

$code = $_SESSION['code'];
if($_SESSION['type'] == "doctor"){
$user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM doctor_view WHERE DOCTOR_CODE = '$code'"));	
}else{
	$user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM login WHERE CODE = '$code'"));
}

$account_user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM login WHERE CODE = '$code'"));
?>
<!DOCTYPE html>
<html>
	<head> 
		<title>Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
		<link rel="stylesheet" href="css/bootstrap.css">

		<link rel="stylesheet" href="css/doctorboard.css">
		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/bootstrap-3.1.1.min.js"></script>

		<style>
			/* Remove the navbar's default margin-bottom and rounded borders */ 
			.navbar {
			  margin-bottom: 0;
			  border-radius: 0;
			  background-color:#FFFFFF;
			}
			
			/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
			.row.content {height: 530px}
			
			/* Set gray background color and 100% height */
			.sidenav {
			  padding-top: 20px;
			  background-color:  #00A1E5;
			  min-height: 550px;
			  
			  
			}
			
			/* Set black background color, white text and some padding */
			footer {
			  background-color: black;
			  color: white;
			  padding: 15px;
			}
			
			/* On small screens, set height to 'auto' for sidenav and grid */
			@media screen and (max-width: 767px) {
			  .sidenav {
				height: auto;
				<!--padding: 15px;-->
			  }
			  .row.content {height:auto;}
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			  </button>
			  <a class="navbar-brand" id="brandname"  href="index.php"><img src="images/icons/logo.png" width="45px" height="40px" style="float:left; margin:-10px 0px 0px 0px "><div style="float:left; margin:0px 0px 0px 15px;">Health Center</div>&nbsp;&nbsp;&nbsp;	  </a>	
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="dboard.php"><?=ucwords($_SESSION['type']);?>'s Dashboard</a></li>
				
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="profile.php" style="color:#00A1E5;"><span class="glyphicon glyphicon-user"></span> <?=ucwords($_SESSION['name']);?></a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		 	  </ul>
			</div>
		  </div>
		</nav>
		<div class="container-fluid" style="padding:0;">    