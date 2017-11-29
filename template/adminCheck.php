<?php
require "login/loginheader.php";
include_once "index_functions.php";

$usrData = new usrData();

$usr = $_SESSION['username'];
$query = "SELECT id FROM members WHERE username = '$usr'";
$result = $usrData->getID($query);

$id = $result[0]['id'];

$q = "SELECT planner FROM members WHERE id = '$id'";
$pResult = $usrData->getID($q);
$planner = $pResult[0]['planner'];
echo $planner;

if($planner == 0)
{
    header('Location:inc/geenrecht.php');
}
else {
    header('Location:../admin/admin_index.php');
}




 ?>
