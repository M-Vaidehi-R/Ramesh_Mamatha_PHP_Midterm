<div class="user_form">
    <form method="post">
        <div class="each_form_box">
            <label>First Name</label>
            <input type="text" class="" placeholder="Enter your first name" name="fname" autocomplete="off" required value=<?php echo $up_fname?>>
        </div>

        <div class="each_form_box">
            <label>Last Name</label>
            <input type="text" class="" placeholder="Enter your last name" name="lname" autocomplete="off" value=<?php echo $up_lname ?>>
        </div>

        <div class="each_form_box">
            <label>Username</label>
            <input type="text" class="" placeholder="Enter your Username" name="username" autocomplete="off" required value=<?php echo $up_username ?>>
        </div>

        <div class="each_form_box">
            <label>Password</label>
            <input type="password" class="" placeholder="Enter your password" name="password" autocomplete="off" required value=<?php echo $up_password ?>>
        </div>

        <button type="submit" class="" name="submit">Submit</button>
    </form>
</div>

<?php 	require_once('go_back.php');  ?>