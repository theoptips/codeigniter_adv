<?php $pagename= "Wall";

// var_dump($this->session->userdata["user_session"]);
// echo "logged in user_id = ".$this->session->userdata["user_session"]["user_id"];
// echo "recipient user_id =".$wall_user_id;
// var_dump($lookup);

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
		<form action="../user_update<?php echo "/".$wall_user_id;?>" method="post" id="update">
			<div class="span8 post" id="update_box">
				<textarea placeholder="post something here" maxlength="140" name="wall_update[content]" class="span8"></textarea>
				<input type="hidden" name="wall_update[user_id]" value="<?php echo $this->session->userdata["user_session"]["user_id"];?>"/>
				<input type="hidden" name="wall_update[recipient_id]" value="<?php echo $wall_user_id;?>"/>				
			</div>
			<input type="submit" value="Post" class="btn-primary"/>
		</form>

		<div class="post_box span9">
			<?php 
			$message_children=array();
			foreach ($message_data_set as $message) 
			{
				// echo $message->content;
				// echo "<br/>";
				foreach ($message as $key => $value) 
				{
					if ($key == "parent_message_id" && $value != null)
					{
						array_push($message_children, $message);
					}
					if ($key == "parent_message_id" && $value == null) 
					{
					// echo '<div class="post_box span9">';
					// echo '<h3>Someone Wrote...</h3>';
					// echo '<div class="span8 post">';
					// echo $row["content"];
					echo $message->content;

					$running_parent_id =  $message->message_id;
					echo "  running parent id = ".$running_parent_id;
					echo "<br/>";
						foreach ($message_children as $children_row)
							{ ?>
								<div class="span6 mini_post custom_color offset3">
								<?php
								if($children_row->parent_message_id== $running_parent_id)
								{
									// echo '<div class="span6 mini_post red offset3" style="border:1px solid black;" >';
									echo $children_row->content;
									echo $children_row->message_id;	
									// echo '</div>';
								} ?>
								</div>
								<!-- <form action="#" method="post" style="clear:both"> -->
								<?php
							} ?>
<!-- 
					<form action="#" method="post">
		   			<textarea placeholder="post something here" maxlength="140" name="content" class="span5"></textarea>
					<input type="hidden" name="comment_user_id" value="<?php echo $this->session->userdata['user_session']['user_id'];?>"/>
					<input type="hidden" name="comment_recipient_id" value="<?php echo $wall_user_id;?>"/>
					<input type="hidden" name="parent_message_id" value="<?php echo $running_parent_id;?>"/>
					<input type="submit" value="Post" class="btn-primary" style="clear:both"/>
					</form> -->
					<form action="../user_comment<?php echo "/".$wall_user_id;?>" method="post">
		   			<textarea placeholder="post something here" maxlength="140" name="user_comment[content]" class="span5"></textarea>
					<input type="hidden" name="user_comment[user_id]" value="<?php echo $this->session->userdata['user_session']['user_id'];?>"/>
					<input type="hidden" name="user_comment[recipient_id]" value="<?php echo $wall_user_id;?>"/>
					<input type="hidden" name="user_comment[parent_message_id]" value="<?php echo $running_parent_id;?>"/>
					<input type="submit" value="Post" class="btn-primary" style="clear:both"/>
					</form>
					<?php
					}
				}
			};
			// var_dump($message_children);

			
			?>
		</div>
		
	</div>
	</body>
</html>

<!-- <textarea placeholder="post something here" maxlength="140" name="content" class="span8"></textarea>
				<input type="hidden" name="user_id" value="<?php //echo $this->session->userdata["user_session"]["user_id"];?>"/>
				<input type="hidden" name="recipient_id" value="<?php //echo $wall_user_id;?>"/>			 -->