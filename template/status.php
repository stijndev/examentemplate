<?php require "login/loginheader.php";
      include "inc/header.php";
      include_once "index_functions.php";

      $usrData = new usrData();

      $usr = $_SESSION['username'];

      $query = "SELECT fk_stat_id FROM members WHERE username = '$usr'";
      $result = $usrData->displayStatus($query);

      $sQuery = "SELECT * FROM status";
      $sResult = $usrData->displayStatus($sQuery);



 ?>

    <div id="wrapper" class="toggled">

      <?php include "inc/sidenav.php"; ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>Installatiebedrijf Hakkers - Status</h1>

              <form method="post" action="statusupdate.php">
                <div class="form-group">
                  <select name="status" id="status" class="form-control">
                    <?php
                    foreach($sResult as $key => $sRes) {
                      echo '<option value="'. $sRes['id'] .'" >'. $sRes['status'] .'</option>';
                    }
                    ?>
                  </select>
  							</div>
                <button name="statusupdate" id="statusupdate" class="btn btn-primary">Update</button>
              </form>
              <br>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <?php include "inc/scripts.php"; ?>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>


<!-- <div class="form-signin">
  <div class="alert alert-success">You have been <strong>successfully logged in</strong>.</div>
  <a href="login/logout.php" class="btn btn-default btn-lg btn-block">Logout</a>
</div> -->
