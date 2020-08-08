
<div class="col-md-2 sidenav sideleft" >
	<ul class="nav navbar-stacked" id="side_menu">
		<li><a href="dboard.php" <?=(($file_name == 'dboard')?'class="active"':'')?>>My Account</a></li>
		<li><a href="profile.php" <?=(($file_name == 'profile')?'class="active"':'')?>><?=(($_SESSION['type']=='doctor')?'Professional':'');?> Profile</a></li>
		<?php if($_SESSION['type']=='doctor'){?>
		<li><a href="schedule.php" <?=(($file_name == 'schedule')?'class="active"':'')?>>Schedule</a></li>
		<li><a href="appointments.php" <?=(($file_name == 'appointments')?'class="active"':'')?>>New Appointments</a></li>
		<li><a href="old_appointments.php" <?=(($file_name == 'old_appointments')?'class="active"':'')?>>Old Appointments</a></li>
		<li><a href="reports.php" <?=(($file_name == 'reports')?'class="active"':'')?>>Reports</a></li>
		<?php }else{ ?>
		<li><a href="online_doctor.php" <?=(($file_name == 'online_doctor')?'class="active"':'')?>>Online Doctor</a></li>
		<li><a href="appointments_history.php" <?=(($file_name == 'appointments_history')?'class="active"':'')?>>Appointments</a></li>
		<?php } ?>
	</ul>	
</div>