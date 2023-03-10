<?php

require_once('UserDatabase.php');

class UserModel extends UserDatabase {

public function __construct() {
	parent::__construct();
	$this->table = 'tbl_user';
	$this->updated_table = 'view_user_role';
	$this->fields = "user_fname,user_lname,user_username,user_password";
}

public function newUser($formvalues) {
	$statement = "(" . $this->fields . ") VALUES (?,?,?,?)";
	$this->create($statement,$formvalues);
	
	echo "Data Inserted Successfully";
}

public function updateUser($formvalues) {
	$statement = " SET user_fname=?,user_lname=?,user_username=?,user_password=? WHERE user_id=?";
	$this->update($statement,$formvalues);
}

public function deleteUser($user_id) {
	//code to be sure the deletion should happen
	$this->delete($user_id);
}

//not working :(
public function login($username, $password) {
    $stmt = $this->connection->prepare("SELECT * FROM ".$this->table." WHERE user_username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch($this->connection::FETCH_ASSOC);
    if ($user && isset($user['user_password']) && password_verify($password, $user['user_password'])) {
        return $user;
    } else {
        return false;
    }
}
}

?>