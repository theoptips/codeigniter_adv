<?php $pagename= "Edit User";
// echo "user_id".$edit_value[0]->user_id;
// echo "email".$edit_value[0]->email;
// echo "firstname".$edit_value[0]->firstname;
// echo "lastname".$edit_value[0]->lastname;
// echo "user_level".$edit_value[0]->user_level;

?>
<html>
	<?php require('application/views/partials/header.php');?>
	<body>
	<?php require('application/views/partials/navbar_dashboard.php');?>
	<div class="container">
		<?php require('application/views/partials/show_error.php');?>
		<div class="row">
			<div class="span3"><h4>Edit User #<?php echo $edit_value[0]->user_id;?></h4></div>
			<button class="btn-primary span3 offset4">Return to Dashboard</button>
		</div>
		<div class="row">
			<div class="span5 boxborder">
				<h4>Edit Information</h4>
				<form id="edituser" action="../edit_user<?php echo "/".$edit_value[0]->user_id;?>" method="post" class="form-horizontal">
					<label>Email Address</label>
					<input type="text" name="edit_email" value="<?php echo $edit_value[0]->email;?>" />
					<label>First Name</label>
					<input type="text" name="firstname" value="<?php echo $edit_value[0]->firstname;?>" />
					<label>Last Name</label>
					<input type="text" name="lastname" value="<?php echo $edit_value[0]->lastname;?>" />
					<input type="hidden" name="user_id" value= "<?php echo $edit_value[0]->user_id;?>"/>
					<label>User Level:</label>
					<select name="select" value="<?php echo $edit_value[0]->user_level;?>" selected="<?php echo $edit_value[0]->user_level;?>">
						<option>Normal</option>
						<option>Admin</option>
					</select>
				
					<input type="submit" value="Save" class="btn-success"/>
				</form>
			</div>
			<div class="span5 boxborder">
				<h4>Edit Password</h4>
				<form id="editpassword" action="../edit_user<?php echo "/".$edit_value[0]->user_id;?>" method="post" class="form-horizontal">
					<label>Password</label>
					<input type="password" name="edit_password" />
					<label>Confirm Password</label>
					<input type="password" name="edit_passwordconfirm"/>

					<input type="submit" value="Update Password" class="btn-success"/>
				</form>
			</div>
		</div>
		<div class="row">
			<h4></h4>
			<div class="span12 boxborder">Hi</div>
		</div>
	</div>
	</body>
</html>