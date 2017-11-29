<?php
include_once("functions.php");

$admin = new Admin();

//id ophalen
$id = $admin->escape_string($_GET['id']);

//deleting veld uit tabel
//$result = $admin->execute("DELETE FROM jobs WHERE id=$id");
$result = $admin->deleteJob($id, 'jobs');

if ($result) {
	//redirect
	header("Location:admin_index.php");
}
?>
