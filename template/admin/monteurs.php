<?php require 'admn_inc/admin_loginheader.php';
      include_once 'functions.php';
      include 'admn_inc/admin_header.php';
      $admin = new Admin();

      // query uitvoeren en monteur gegevens ophalen
      $query = "SELECT * FROM members WHERE planner = 0";
      $result = $admin->displayMechanics($query);
      ?>

<div id="wrapper" class="toggled">

<?php include "admn_inc/admin_nav.php"; ?>


        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>Installatiebedrijf Hakkers - Monteurs</h1>
                <p>Open het menu door op de knop hieronder te klikken.</p>

                  <table class="table">
                    <thead>
                      <tr>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Telefoonnummer</th>
                        <th>Gebruikersnaam</th>
                        <th>E-mail</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                  <tbody>

                <?php
                foreach($result as $key => $res) {
                  echo '<tr>
                        <td>'. $res['firstname'] .'</td>
                        <td>'. $res['lastname'] .'</td>
                        <td>'. $res['phone'] .'</td>
                        <td>'. $res['username'] .'</td>
                        <td>'. $res['email'] .'</td>
                        <td>'. $res['fk_stat_id'] .'</td>
                        </tr>
                  ';
                }
                ?>

            </tbody>
          </table>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <?php include "admn_inc/admin_scripts.php"; ?>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
