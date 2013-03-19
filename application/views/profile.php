
<?php
// echo "var_dump( ) at the end";
// var_dump($all);
// echo gettype($all); //previously array, now object
// check sesion
// var_dump($this->user_session_rest);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Profile View</title>
	</head>
	<h1>Welcome</h1>
	<h2>User Information</h2>
	<ul>
		<li>Email: <?php echo $all->email;?></li>
		<li>First Name: <?php echo $all->firstname;?></li>
		<li>Last Name: <?php echo $all->lastname;?></li>
<!-- 		<li>Password</li> -->
		<li>Created Datetime <?php echo $all->created_datetime;?></li>
	</ul>
	<a href="../user/logout">Log Off</a>
</html>
