<div class="user_list">
	<div class="user_list_box">
		<ul>
			<?php
			
			for($i = 0; $i < $rows; $i++) { 
				echo '<a class="" href="index.php?user_id='.$users[$i]->user_id.'">
						<li>'.$users[$i]->user_fname.' '.$users[$i]->user_lname.'</li>
					</a>';
			}
			?>
		</ul>
	</div>

	<div class="extra_btns">
		<div>
			<a class="json_btn" href="http://localhost/midterm-oop/views/json.php">View Json</a>
		</div>
		
		<div class="login_btn">
			<a href="http://localhost/midterm-oop/index.php?task=login">Login</a>
		</div>
	</div>
</div>

