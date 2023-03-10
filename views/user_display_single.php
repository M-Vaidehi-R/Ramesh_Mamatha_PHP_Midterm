<div class="user_details_profile_box">
	<?php
	echo 
	'
		<div class="user_details">
			<div class="user_profile_img">
				<img src="./images/'.$users[0]->user_photo.'">
			</div>
			
			<div class="user_detail_info">
				<div class="user_info">
					<p class="label"><span>Name:</span></p> '.$users[0]->user_fname.', '.$users[0]->user_lname.'<br>
					<p class="label"><span>Username:</span></p> '.$users[0]->user_username.'<br>
					<p class="label"><span>Role:</span></p> '.$users[0]->role_name.'<br>
					<p class="label"><span></span></p> '.$users[0]->role_description.'<br>
				</div>
			</div>
		</div>
	';
	?>
</div>

<br><br>

<div class="basic_btns">
	<?php	
	echo '<a class="btn_delete" href="http://localhost/midterm-OOP/index.php?task=delete&id='.$users[0]->user_id.'">Delete</a><br>';
	echo '<a lass="btn_delete" href="http://localhost/midterm-OOP/index.php?task=update&id='.$users[0]->user_id.'">Update</a>';
	require_once('go_back.php');
	?>
</div>