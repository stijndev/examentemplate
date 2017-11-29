<?php
//PUT THIS HEADER ON TOP OF EACH UNIQUE PAGE
session_start();

include_once "functions.php";
$admin = new Admin();

$lUsr = $_SESSION['username'];

$query = "SELECT planner FROM members WHERE username = '$lUsr'";

$result = $admin->displayJobs($query);

$planner = $result[0]['planner'];

if($planner == 0)
{
  header("Location:../inc/geenrecht.php");
}


if (!isset($_SESSION['username']))
{
    header("Location:../login/main_login.php");
}
