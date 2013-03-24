<?php $pagename= "Wall";

var_dump($this->session->userdata["user_session"]);
?>
<html>
	<?php require('application/views/partials/header.php');?>
	<body>
	<?php require('application/views/partials/navbar_dashboard.php');?>
	<div class="container">
		<h2>Michael Choi</h2>
		<h4>Registered at: </h4>
		<h4>User id: <?php echo $wall_user_id;?></h4>
		<h4>Email address:</h4>
		<h4>Description: </h4>
		<form action="#" method="post" id="update">
			<div class="span8 post" id="update_box">
				<textarea placeholder="post something here" maxlength="140" name="content" class="span8"></textarea>
				<!-- <input type="hidden" name="user_id" value="<?php echo $author;?>"/> -->
				<input type="hidden" name="recipient_id" value="<?php echo $wall_user_id;?>"/>						
			</div>
			<input type="submit" value="Post" class="btn-primary"/>
		</form>
		
	</div>
	</body>
</html>