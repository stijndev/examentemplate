<?php

include_once 'functions.php';
$admin = new Admin();

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $mechanic = $_POST['mechanic'];
    $type = $_POST['type'];
    $problem = $_POST['problem'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $customername = $_POST['customername'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $customerphone = $_POST['customerphone'];


    $admin->updateJob($id, $title, $mechanic, $type, $problem, $date, $time, $address, $city, $zip, $customerphone, $customername);
    header('Location:admin_index.php');

}


?>
