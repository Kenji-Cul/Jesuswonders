<?php 
include_once "projectlog.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
$name = $_POST['name'];
$email = $_POST['email'];
if(empty($name) || empty($email)){
  $errormsg =  "Please input all fields";
} elseif(($name == "") || ($email == "")){
    $errormsg = "Please input all fields";
} else{
$insert = new User;
$checker = $insert->checkEmailAddress(check_input($email));
if(!empty($checker)){ 
   $errormsg = "Email Address already exists";
}  else {
$insertor = $insert->createUser(check_input($name),check_input($email));
}
}

if(isset($errormsg)){
    echo $errormsg;
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