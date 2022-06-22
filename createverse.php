<?php 
include_once "projectlog.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
$chapter = $_POST['chapter'];
$verse = $_POST['verse'];

if(empty($chapter) || empty($verse)){
    $errormsg = "Please input all fields";
} elseif($chapter == "" || $verse == ""){
    $errormsg = "Please input all fields";
} else {
$versecreator = new User;
$verse = $versecreator->createBibleVerses(check_input($chapter),check_input($verse));
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