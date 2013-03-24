<?php $pagename= "Signin Page";
	//http://localhost:8888/index.php/handler/signin
?>
<!DOCTYPE HTML>
<html>
	<?php require('application/views/partials/header.php');?>
	<body>
	<?php require('application/views/partials/navbar.php');?>
	<div class="container">
	<?php require('application/views/partials/show_error.php');?>
		<form id="login" action="../handler/process_login" method="post" class="form-horizontal">
			<label>Email</label>
			<input type="text" name="email" />
			<label>Password</label>
			<input type="password" name="password" />
			<input type="submit" value="login" class="btn-success"/>
		</form>
		<a href="/index.php/handler/register">Don't Have an Account? Register Here</a>
	</div>
	</body>
</html>