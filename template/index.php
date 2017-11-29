<?php require "login/loginheader.php";
      include "inc/header.php";
      include_once "index_functions.php";

      // class
      $usrData = new usrData();

      // current user ingelogd
      $usr = $_SESSION['username'];

      // get id van ingelogde user
      $query = "SELECT id FROM members WHERE username = '$usr'";
      $result = $usrData->getID($query);

      $id = $result[0]['id']; // current user id

      // query haalt info op uit jobs, neemt data van city en type tabel mee
      $q = "SELECT jobs.id, date, time, address, cityname, title, problem, jobtype, customerphone FROM jobs
            INNER JOIN city
            ON fk_city_id = city.id
            INNER JOIN type
            ON fk_type_id = type.id
            WHERE fk_mech_id = '$id'
            ORDER BY date";
      $jResult = $usrData->getID($q);





 ?>

    <div id="wrapper" class="toggled">

      <!-- include navigatie aan de zijkant -->
      <?php include "inc/sidenav.php"; ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>Home</h1>
                <p class="alert alert-succes">Welkom <strong><?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; } // echo gebruikersnaam ?>,</strong> je bent <strong></strong> succesvol ingelogd! De volgende klussen staan voor jou klaar:</p>
                <?php
                // echo tabel inclusief db data
                echo '<table class="table">
                <thead>
                  <tr>
                    <th>Datum</th>
                    <th>Tijd</th>
                    <th>Straat</th>
                    <th>Plaats</th>
                    <th>Titel</th>
                    <th>Probleem</th>
                    <th>Type</th>
                    <th>Telefoonnr.</th>
                  </tr>
                </thead>
                <tbody>'; // loop tabel
                foreach($jResult as $key => $jRes) {
                echo "<tr>";
                echo "<td>".$jRes['date']."</td>";
                echo "<td>".$jRes['time']."</td>";
                echo "<td>".$jRes['address']."</td>";
                echo "<td>".$jRes['cityname']."</td>";
                echo "<td>".$jRes['title']."</td>";
                echo "<td>".$jRes['problem']."</td>";
                echo "<td>".$jRes['jobtype']."</td>";
                if($jRes['jobtype'] == 3)
                {
                  echo '
                  <script>
                  alert("Storing! Bekijk de klus voor meer details.");
                  </script>
                  ';
                }
                echo "<td>".$jRes['customerphone']."</td>";

                echo "<td><a class='btn btn-primary' href=\"read.php?id=$jRes[id]\">Bekijken</a></td>";

                }

                echo '</tbody>
                </table>';
                ?>
                <p>Sluit het menu door op de knop hieronder te klikken.</p>
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
