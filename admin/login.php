<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-style.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/login.css" />
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </head>
    <body onLoad="foc()">
    <?php
if(isset($_POST['login'])){
	session_start();
	$email = $_POST['email'];
	$pass = $_POST['password'];
	if($email == 'admin' && $pass == 'admin'){
		$_SESSION['name']= 'admin';
		header("location:index.php");
		exit();
	}
	else{
		echo'<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p style="text-align:center;"><strong>Login Failed!</strong> Incorrect UserName Or Password.</p>
  	</div>';
	}
}


?>
        <div class="container">
			<header>
			
				<h1><strong>Login</strong></h1>
			</header>
			<section class="main">
				<form class="form-1" method="post" action="login.php">
					<p class="field">
						<input type="text" name="email"  id="email" placeholder="Username or email" required>
						<i class="icon-user icon-large" style="text-align:center;"></i>
					</p>
						<p class="field">
							<input type="password" name="password" placeholder="Password" required>
							<i class="icon-lock icon-large" style="text-align:center;"></i>
					</p>
					<p class="submit">
						<button type="submit" name="login"><i class="icon-arrow-right icon-large"></i></button>
					</p>
				</form>
			</section>
        </div>
    </body>
    <script>
		function foc(){
    	document.getElementById("email").focus();
		}
    </script>
</html>