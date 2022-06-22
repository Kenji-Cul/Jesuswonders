<?php 
include "projectlog.php";
if(isset($_POST['imgname']) && $_POST['imgname'] != ""){
$slider = new User;
$sliderone = $slider->createVideoOne(check_input($_POST['imgname']));
echo $sliderone;
}
    else {
    echo "Input video text";
}

function check_input($data){
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>