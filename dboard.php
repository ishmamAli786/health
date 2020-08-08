<?php  include"includes/dboard_header.php";?>
<?php  include"includes/dboard_sidebar.php";?>
<div class="col-md-10" style="background-color:#F0F0F0;">
	<?php include("includes/msg.php");?>
	<?php if(@$_GET['edit'] == "account"){?>
	<h2>Edit Account Information</h2>
	<form action="dboard.php" method="post">
		<div class="form-group col-md-6">
			<label for="name">NAME</label>
			<input type="text" name="name" value="<?= $account_user['NAME'];?>"  class="form-control">
		</div>
		<div class="form-group col-md-6">
			<label for="fname">FATHER's NAME</label>
			<input type="text" name="fname" value="<?= $account_user['FATHER_NAME'];?>" class="form-control">
		</div>
		<div class="form-group col-md-6">
			<label for="mob">CONTACT NUMBER</label>
			<input type="text" name="mob" class="form-control" value="<?= $account_user['CONTACT_NUMBER'];?>">
		</div>
		<div class="form-group col-md-6">
			<label for="npass">NEW PASSWORD</label>
			<input type="password" name="npass" class="form-control">
		</div>
		<div class="form-group col-md-12">
			<button type="submit" class="btn btn-info">Submit</button>
		</div>
	</form>
	<?php } else{?>
	<h2 class="pull-left">Account Information</h2>
	<a href="dboard.php?edit=account" style="margin:20px 0;" class="btn btn-info pull-right">Edit Account</a>
	<table class="table table-striped">
    <thead>
      <tr>
        <th>NAME</th>
        <th>FATHER's NAME</th>
        <th>EMAIL</th>
		<th>CONTACT NUMBER</th>
		<th>ADDRESS</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?= $account_user['NAME'];?></td>
        <td><?= $account_user['FATHER_NAME'];?></td>
        <td><?= $account_user['EMAIL'];?></td>
        <td><?= $account_user['CONTACT_NUMBER'];?></td>
        <td><?= $account_user['ADDRESS'];?></td>
      </tr>
    </tbody>
  </table>
	<?php } ?>
</div>
<?php include("includes/dboard_footer.php");?>
