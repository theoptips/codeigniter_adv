<?php $pagename= "Test App Home Page";?>
<!DOCTYPE HTML>
<html>
	<?php require('application/views/partials/header.php');?>
	<body>
	<?php require('application/views/partials/navbar.php');?>
	<div class="container">
		<div class="hero-unit">
			<p>We're going to build a cool application using a MVC framework! @codingdojo</p>
			<button class="btn-primary specialspecial"><a href="../index.php/handler/signin">Start</a></button>
		</div>
		<div class="row">
			<div class="span4">
				<h3>Manage Users</h3>
				<p>Using this application you will learn how to add edit remove users</p>
			</div>
			<div class="span4">
				<h3>Leave Messages</h3>
				<p>Users will be able to leave a message to another user using this application.</p>
			</div>
			<div class="span4">
				<h3>Edit User Information</h3>
				<p>Admin will be able to edit another user's information.</p>
			</div>
		</div>
	</div>
	</body>
</html>