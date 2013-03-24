<?php $pagename= "Signin Page";
?>
<!DOCTYPE HTML>
<html>
	<?php require('application/views/partials/header.php');?>
	<body>
	<?php require('application/views/partials/navbar_dashboard.php');?>
	<div class="container">
		<?php require('application/views/partials/show_error.php');?>
		<div class="row span12">
			<div class="span3"><h4>Manage Users	</h4></div>
			<button class="btn-primary span3 offset3">Add new</button>
		</div>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created At</th>	
					<th>User Level</th>	
					<th>Actions</th>						
				</tr>
			</thead>
			<tbody>
				<?php echo $html;?>
			</tbody>
		</table>
	</div>
	</body>
</html>