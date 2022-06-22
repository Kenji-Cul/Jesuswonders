<?php 
include_once "projectlog.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $delete = new User;
    $deletevid = $delete->deletePost($_POST['unique']);
}