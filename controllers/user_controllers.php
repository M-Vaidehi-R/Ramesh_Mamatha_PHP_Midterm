<?php

require_once('./models/UserDatabase.php');
require_once('./models/UserModel.php');

class User{

    
    private $UserModel;
    protected $connection;

    public function __construct() {
        $this->UserModel = new UserModel(); 
		$dsn = "mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=utf8mb4";
		try {
		  $this->connection = new PDO($dsn, DB_USER, DB_PASS);
		} catch (Exception $e) {
		  error_log($e->getMessage());
		  exit('unable to connect');
		}
	}



    public function loadViews(){
        //add header, nav etc when created
        require_once('views/user_head.php');
        require_once('./views/user_create_button.php');

        //now, we look into the parameters which are passed via the URL

        //So, if we only get an ID and no task
        if(isset($_GET['user_id']) && !isset($_GET['task'])) {

            $users = $this->UserModel->getOne($_GET['user_id']);
            include('views/user_display_single.php');
        }

        //If we dont get any ids but we get a task
        else if(isset($_GET['task'])){

            //the task is to create a new employee
            if($_GET['task']=='create'){
                //we have to get the values from the form
                require_once('./views/user_form.php');
                if(isset($_POST['submit'])){
                $formvalues = array(
                     $_POST['fname'],
                     $_POST['lname'],
                     $_POST['username'],
                     $_POST['password']
                );
                
                $users = $this->UserModel->newUser($formvalues);
                header("location:index.php");
                echo "Created Successfully";
            }}

            else if($_GET['task']=='delete'){
                $users = $this->UserModel->deleteUser($_GET['id']);
                header("location:index.php");
                echo "Deleted Successfully";
            }

            // else if($_GET['task']=='json'){
            //     header("location:json.php");
            //     echo "Deleted Successfully";
            // }

            else if($_GET['task']=='update'){
                $updateid = ($_GET['id']);
                $stmt=$this->connection->prepare("SELECT user_lname, user_fname, user_username, user_password FROM tbl_user WHERE user_id = ?");
                
                $stmt->execute([$updateid]);
                $update_row = $stmt->fetch(PDO::FETCH_ASSOC);

                $up_fname=$update_row['user_fname'];
                $up_lname=$update_row['user_lname'];
                $up_username=$update_row['user_username'];
                $up_password=$update_row['user_password'];

                include('./views/user_update_form.php');
                if(isset($_POST['submit'])){
                    $formvalues = array(
                         $_POST['fname'],
                         $_POST['lname'],
                         $_POST['username'],
                         $_POST['password'],
                         $updateid
                    );
                $users = $this->UserModel->updateUser($formvalues);
                header("location:index.php");
                echo "Updated Successfully";
            }}

            else if($_GET['task']=='login'){
                    // check if the login form was submitted
                    include('./views/login_form.php');
                    if(isset($_POST['submit'])) {
                        // get the username and password from the form
                        $username = $_POST['username'];

                        $password = $_POST['password'];
            
                        $user = $this->UserModel->login($username, $password);
            
                        if ($user) {
                            include('views/login_headerTo_page.php');
                            //header('Location: ./views/login_headerTo_page.php');
                        } else {
                            // authentication failed, show error message
                            $errorMessage = "Unexpected Error!";
                            echo "$errorMessage";
                        }
                    }
                }
        

        }

        //end of CRUD 
        else {
            $users = $this->UserModel->getAll();
            $rows = $this->UserModel->rows;
            include('views/user_display_all.php');    
        }

        //end of displaying 

        //add footer
        require_once('./views/user_footer.php');
    }
}

?>