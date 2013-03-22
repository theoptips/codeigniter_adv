<?php $pagename= "Signin Page";?>
<!DOCTYPE HTML>
<html>
	<?php require('application/views/partials/header.php');?>
	<body>
	<?php require('application/views/partials/navbar.php');?>
	<div class="container">
		<?php require('application/views/partials/show_error.php');?>
		<form id="register" action="../handler/process_register" method="post" class="form-horizontal">
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
			<input type="submit" value="Register" class="btn-success"/>
		</form>
		<a href="/index.php/handler/signin">Already Have an Account? Sigin Here</a>
	</div>
	</body>
</html>