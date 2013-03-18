
<?php
// echo "var_dump( ) at the end";
var_dump($all);
// echo gettype($all); //previously array, now object
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Profile View</title>
	</head>
	<h1>Welcome UserFirstName</h1>
	<h2>User Information</h2>
	<ul>
		<li>Email: <?php echo $all->email;?></li>
		<li>First Name: <?php $all->firstname;?></li>
		<li>Last Name: <?php $all->lastname;?></li>
<!-- 		<li>Password</li> -->
		<li>Created Datetime</li>
	</ul>
</html>
