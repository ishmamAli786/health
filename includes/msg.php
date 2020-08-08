
<?php
	if(isset($_SESSION['error'])){
?>

	<div class="alert alert-danger alert-dismissable">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <p class="text-center"><strong><?=$_SESSION['error'];?></strong></p>
	</div>
<?php 
	unset($_SESSION['error']);
	}
	if(isset($_SESSION['success'])){ 
?>
	<div class="alert alert-success alert-dismissable">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <p class="text-center"><strong><?=$_SESSION['success'];?></strong></p>
	</div>
<?php
		unset($_SESSION['success']);
		if(isset($_SESSION['logout'])){
			session_destroy();
		}
	}
?>
