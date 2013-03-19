<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CodeIgniter Intermediate</title>
	</head>
	<body>
		<div id="messages">
			<?php 
				// atttempt at ajax
			if (isset($message)) 
			{
				echo $message;
			}
			if (isset($error)) 
			{
				echo $error;
			}
			// echo $message;
			// var_dump($message);
				// if (isset($messages)) 
				// {
				// 	foreach ($messages as $msg_category => $message) {
				// 		echo $message;
				// 	}
				// }
			?>
		</div>
		<form id="login" action="../user/process_login" method="post">
			<label>Email</label>
			<input type="text" name="email" />
			<label>Password</label>
			<input type="password" name="password" />
			<input type="submit" value="login"/>
		</form>

		<h3>Registration Form</h3>
		<form id="register" action="../user/process_register" method="post">
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
			<input type="submit" value="Register"/>
		</form>
	</body>
</html>