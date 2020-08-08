<?php
session_start();
if(isset($_SESSION['code']) AND isset($_SESSION['email']) AND isset($_SESSION['fname']) AND isset($_SESSION['lname']) AND isset($_SESSION['type']) AND isset($_SESSION['password']) AND isset($_SESSION['status'])){
	session_destroy();
	unset($_SESSION['code']);
	unset($_SESSION['fname']);
	unset($_SESSION['lname']);
	unset($_SESSION['email']);
	unset($_SESSION['type']);
	unset($_SESSION['status']);
	unset($_SESSION['password']);
	header("location:../../login.php");	
}
else{
	header("location:../../login.php");
	}


?>