<?php $pagename= "New User";?>
<!DOCTYPE HTML>
<html>
	<?php require('application/views/partials/header.php');?>
	<body>
	<?php require('application/views/partials/navbar_dashboard.php');?>
	<div class="container">
		<div class="row span12">
			<div class="span3"><h4>Add a New User</h4></div>
			<button class="btn-primary span3 offset3"><a href="../dashboard/admin">Return to Dashboard</a></button>
		</div>
		<form id="adduser" action="../handler/process_register" method="post" class="form-horizontal">
			<label>First Name</label>
			<input type="text" name="firstname"/>
			<label>Last Name</label>
			<input type="text" name="lastname" />
			<label>Email Address</label>
			<input type="text" name="register_email" />
			<label>Password</label>
			<input type="password" name="register_password" />
			<label>Confirm Password</label>
			<input type="password" name="register_confirmpassword" />
			<input type="submit" value="create" class="btn-success"/>
		</form>
	</div>
	</body>
</html>