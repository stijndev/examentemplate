<?php
include_once "index_functions.php";

$usrData = new usrData();

$usr = $_SESSION['username'];
$query = "SELECT id FROM members WHERE username = '$usr'";
$result = $usrData->getID($query);

$id = $result[0]['id'];

$q = "SELECT planner FROM members WHERE id = '$id'";
$pResult = $usrData->getID($q);
$planner = $pResult[0]['planner'];






 ?>



<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="index.php">
                Installatiebedrijf Hakkers
            </a>
        </li>
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
          <a href="status.php">Status</a>
        </li>

        <?php

        if($planner == 1)
        {
          echo '
          <li>
            <a href="adminCheck.php">Admin panel</a>
          </li>
          ';
        }

        ?>
        <li>
            <a href="login/logout.php">Logout</a>
        </li>
    </ul>
</div>
<!-- /#sidebar-wrapper -->
