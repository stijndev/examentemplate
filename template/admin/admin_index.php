<?php require 'admn_inc/admin_loginheader.php';
      include_once 'functions.php';
      include 'admn_inc/admin_header.php';
      $admin = new Admin();

      //fetching data op datum
      $uquery = "SELECT * FROM jobs ORDER BY date";

      $query = "SELECT jobs.id, date, time, address, title, problem, customerphone, fk_mech_id, cityname, firstname, lastname FROM jobs
            INNER JOIN city
            ON fk_city_id = city.id
            INNER JOIN members
            ON fk_mech_id = members.id
            ORDER BY date";
      $result = $admin->displayJobs($query);
      ?>



<div id="wrapper" class="toggled">

<?php include "admn_inc/admin_nav.php"; ?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <h1>Installatiebedrijf Hakkers - Beheer</h1>
        <h2>Gebruiker: <?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?></h2>


<?php
// echo tabel inclusief db data
echo '<table class="table">
<thead>
  <tr>
    <!-- <th hidden>ID</th> -->
    <th>Datum</th>
    <th>Tijd</th>
    <th>Straat</th>
    <th>Plaats</th>
    <th>Titel</th>
    <th>Probleem</th>
    <th>Telefoonnr.</th>
    <th>Monteur</th>
  </tr>
</thead>
<tbody>'; // loop tabel
foreach($result as $key => $res) {
echo "<tr>";
// echo "<td hidden>".$res['id']."</td>";
echo "<td>".$res['date']."</td>";
echo "<td>".$res['time']."</td>";
echo "<td>".$res['address']."</td>";
echo "<td>".$res['cityname']."</td>";
echo "<td>".$res['title']."</td>";
echo "<td>".$res['problem']."</td>";
echo "<td>".$res['customerphone']."</td>";
echo "<td>".$res['firstname']." ". $res['lastname'] ." </td>";

echo "<td><a class='btn btn-primary' href=\"edit.php?id=$res[id]\">Wijzigen</a>  <a class='btn btn-primary' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Weet je zeker dat je deze klus wilt verwijderen??')\">Verwijderen</a></td>";

}

echo '</tbody>
</table>';
?>

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
