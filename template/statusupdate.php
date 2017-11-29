<?php

include_once 'index_functions.php';
$usrData = new usrData();

if(isset($_POST['statusupdate']))
{
    $id = $_POST['id'];
    $status = $_POST['status'];


    $usrData->updateStatus($id, $status);
    header('Location:index.php');

}

else {
  echo 'fail';
}

?>
