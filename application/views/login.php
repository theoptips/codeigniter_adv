<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CodeIgniter Intermediate</title>
	</head>
	<body>
		<form id="login" action="../user/process_login" method="post">
			<label>Email</label>
			<input type="text" name="email" />
			<label>First Name</label>
			<input type="text" name="firstname"/>
			<label>Last Name</label>
			<input type="text" name="lastname" />
			<label>Password</label>
			<input type="password" name="password" />
			<input type="submit" value="login"/>
		</form>
	</body>
</html>