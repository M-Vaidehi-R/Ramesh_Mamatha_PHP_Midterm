<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=UTF-8;');
$con = new mysqli('localhost', 'root', '', 'db_oop_midterm');

if(!$con){
    die(mysqli_error($con));
}
$sql='SELECT * FROM `tbl_user`';
$result = mysqli_query($con, $sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
    $data= array(
        $name=$row['user_fname'],
        $lname=$row['user_lname'],
        $username=$row['user_username']
    );
echo json_encode($data)."\n";
}}

?>