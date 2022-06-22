<?php 
include_once "projectlog.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $password = $_POST['password'];
    if(empty($password) || $password == ""){
        echo "Please input password";
    } else {
    $changer = new User;
    $changepasscode = $changer->updatePasscode(check_input($password));
    }
}

function check_input($data){
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
