<?php 
session_start();
include_once "projectlog.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
$email = $_POST['loginemail'];
    if(empty($email) || $email == ""){
       echo "Please input your email";
    } else {
$user = new User;
$loginuser = $user->login(check_input($email));
if(!empty($loginuser)){
    $_SESSION['username'] = $loginuser['username'];
    echo "successful";
} else {
    echo "Invalid details try again";
}
    }
}

function check_input($data){
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>