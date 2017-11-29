<?php
include_once '../functions.php';
$admin = new Admin();
if(isset($_POST['save']))
{
	$title = $_POST['title'];
	$mechanic = $_POST['mechanic'];
	$type = $_POST['type'];
	$problem = $_POST['problem'];
	$date = $_POST['date'];
  $time = $_POST['time'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $zip = $_POST['zip'];
  $customerphone = $_POST['customerphone'];
  $customername = $_POST['customername'];

	// insert
    $admin->createJob($title, $mechanic, $type, $problem, $date, $time, $address, $city, $zip, $customerphone, $customername);
	// insert
		echo '<div>Succes!</div>';
	header("Location: ../beheer.php");
}


?>
