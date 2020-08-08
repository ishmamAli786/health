<?php
include("config/int.php");
// GET FILE NAME
$file_name = pathinfo($_SERVER["REQUEST_URI"], PATHINFO_FILENAME);
$error ="";
if (isset($_POST['NAME'])) {
	$email = test_input($_POST['EMAIL']);
	$pass = test_input($_POST['PASSWORD']);
	$repass = test_input($_POST['RE-PASSWORD']);
	$name = test_input($_POST['NAME']);
	$fname = test_input($_POST['FATHER_NAME']);
	$mob = test_input($_POST['CONTACT_NUMBER']);
	$cnic = test_input($_POST['CNIC']);
	$address = mysqli_real_escape_string($db,test_input($_POST['ADDRESS']));
	$quest = mysqli_real_escape_string($db,test_input($_POST['SECURITY_QUE']));
	$ans = mysqli_real_escape_string($db,test_input($_POST['SECURITY_ANS']));
	$type = test_input($_POST['type']);
	$reg = test_input($_POST['reg']);
	$sp = test_input($_POST['sp']);
	
	// Filter For Data
	$check_cnic = mysqli_num_rows(mysqli_query($db, "SELECT * FROM login WHERE CNIC = '$cnic'"));
	$check_email = mysqli_num_rows(mysqli_query($db, "SELECT * FROM login WHERE EMAIL = '$email'"));
	if(empty($email) || empty($pass) || empty($name) || empty($fname) || empty($mob) || empty($cnic) || empty($address) || empty($quest) || empty($ans) || empty($type) || empty($reg) || empty($sp)){
		$error = "Please Fill All Fields!";
	}
	elseif($pass != $repass){
		$error = 'Passwords Not Match!';
	}
	elseif($check_email > 0){
		$error = 'THIS EMAIL ADRESS ALREADY EXISTS!';
	}
	elseif($check_cnic > 0){
		$error = 'THIS CNIC ALREADY EXISTS!';
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error = 'Please Enter Valid Email Address!';
	}
	elseif(strlen($pass) < 6){
		$error = 'PLEASE ENTER ATLEAST 6 CHARACTERS PASSWORD!';
	}
	elseif(!preg_match('/^[a-zA-Z0-9.]+$/',str_replace(' ', '',$name)) || !preg_match('/^[a-zA-Z0-9.]+$/',str_replace(' ', '',$fname))){
		$error = 'Please Enter Valid Name!';
	}
	elseif(!is_numeric($mob) || strlen($mob) != 11){
		$error = 'Please Enter Valid Mobile Number!';
	}
	elseif(!preg_match('/^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/',$cnic)){
		$error = 'Please Enter Valid CNIC!';
	}
	elseif($type != 'doctor' && $type != 'patient'){
		$error = 'Please Select Valid Status!';
	}
	if(empty($error)){
		$pass = password_hash(test_input($_POST['PASSWORD']), PASSWORD_BCRYPT);
		// INSERT QUERY
		$sql = mysqli_query($db, "INSERT INTO login (NAME, FATHER_NAME, EMAIL, PASSWORD, CNIC, CONTACT_NUMBER, ADDRESS, SECURITY_QUE, SECURITY_ANS, TYPE)
		VALUES ('$name', '$fname', '$email', '$pass', '$cnic', '$mob', '$address', '$quest', '$ans', '$type')");
		$msg = 'USER INFORMATION SUCCESSFULLY ADDED!';
		
		if($sql){
			$doctor_code = mysqli_insert_id($db);
			if($type == "doctor"){
				$dq = mysqli_query($db, "INSERT INTO doctor_detail (DOCTORS_CODE, SPECIALIZATION_CODE, REG_CODE) VALUES ('$doctor_code', '$sp', '$reg')");
				if($sql){
					$_SESSION['success'] = $msg;
					header("Location:dboard.php");
				}
				else{
					$_SESSION['error'] = 'THERE IS SOMETHING WRONG IN DATABASE';
				}
			}
			$_SESSION['success'] = $msg;
			header("Location:dboard.php");
		}
		else{
			$_SESSION['error'] = 'THERE IS SOMETHING WRONG IN DATABASE';
		}	
	}
	else{
		$_SESSION['error'] = $error;
	}
}
if(isset($_POST['login_email'])){
	$email = test_input($_POST['login_email']);
	$pass = test_input($_POST['Password']);
	if(empty($email) || empty($pass)){
		$error = "Please Fill All Fields!";
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error = 'Please Enter Valid Email Address!';
	}
	if(empty($error)){
		$sql = mysqli_query($db, "SELECT * FROM login WHERE EMAIL = '$email'");
		$row = mysqli_num_rows($sql);
		$user = mysqli_fetch_assoc($sql);
		if($row == 1){
			if(password_verify($pass, $user['PASSWORD'])){
				$_SESSION['name'] = $user['NAME'];
				$_SESSION['code'] = $user['CODE'];
				$_SESSION['type'] = $user['TYPE'];
				header("Location:dboard.php");
			}
			else{
				$_SESSION['error'] = "Wrong Password!";
			}
		}
		else{
			$_SESSION['error'] = "Wrong Email Address!";
		}
	}
	else{
		$_SESSION['error'] = $error;
	}
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Health Center</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //js -->


<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>

	<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	<!-- start-smoth-scrolling -->

<!--start-date-piker-->
	<script src="js/jquery-ui.js"></script>
		<script>
			$(function() {
				$( "#datepicker,#datepicker1" ).datepicker();
			});
		</script>
<!--/End-date-piker-->
	<script src="js/responsiveslides.min.js"></script>
			<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
</head>
<body>
<!-- header -->
<div class="header wow zoomIn">
	<div class="container">
		<div class="header_left" data-wow-duration="2s" data-wow-delay="0.5s">
			<ul>
				<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>0302-2261924</li>
				<li><a href="mailto:info@example.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>zeeshanch160@gmail.com</a></li>
			</ul>
		</div>
		<div class="header_right">
			<div class="login">
				<ul>
					<?php
						if(isset($_SESSION['code'])){
					?>
					<li><a href="profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?=$_SESSION['name'];?></a></li>
					<li><a href="dboard.php">DashBoard</a></li>
					<li><a href="logout.php">Logout</a></li>
					<?php }else{ ?>
					<li><a href="#" data-toggle="modal" data-target="#myModal4"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Login</a></li>
					<li><a href="#" data-toggle="modal" data-target="#myModal5"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>SignUp</a></li>
					<?php } ?>
					<li>
						<div class="search-bar">
							<div class="search">		
								<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i> </a>
							</div>
							<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
								<div id="small-dialog" class="mfp-hide">
									<div class="search-top">
										<div class="login_pop">
											<form action="#" method="post">
												<input type="submit" value="">
												<input type="text" name="Type something..." value="Type something..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
											</form>
										</div>				
									</div>
									<script>
												$(document).ready(function() {
												$('.popup-with-zoom-anim').magnificPopup({
													type: 'inline',
													fixedContentPos: false,
													fixedBgPos: true,
													overflowY: 'auto',
													closeBtnInside: true,
													preloader: false,
													midClick: true,
													removalDelay: 300,
													mainClass: 'my-mfp-zoom-in'
												});
																												
												});
									</script>				
								</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header -->
<div class="header-bottom ">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
					<div class="logo grid">
						<div class="grid__item color-3">
							<h1><a class="link link--nukun" href=""><i></i>HEALTH<span>C</span>ENTER</a></h1>
						</div>
					</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--horatio">
						<ul class="nav navbar-nav menu__list">
							<li class="menu__item <?=(($file_name == 'health')?'menu__item--current':'')?>"><a href="http://localhost/health/" class="menu__link">Home</a></li>
							<li class="menu__item <?=(($file_name == 'about')?'menu__item--current':'')?>"><a href="about.php" class="menu__link">About</a></li>  
							<li class="menu__item <?=(($file_name == 'contact')?'menu__item--current':'')?>"><a href="contact.php" class="menu__link">Contact</a></li>
						</ul>
					</nav>
				</div>
			</nav>
		</div>
	</div>
	<?php include("includes/msg.php"); ?>