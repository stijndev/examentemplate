<?php require 'login/loginheader.php';
      include_once 'index_functions.php';
      include 'inc/header.php';
      $usrData = new usrData();

      //id ophalen via url
      $id = $usrData->escape_string($_GET['id']);

      //selecting data associated with this particular id
      $result = $usrData->getID("SELECT * FROM jobs WHERE id=$id");

      // loop variables jj
      foreach ($result as $res) {
          $title = $res['title'];
          $mechanic = $res['fk_mech_id'];
          $type = $res['fk_type_id'];
          $problem = $res['problem'];
          $date = $res['date'];
          $time = $res['time'];
          $customername = $res['customername'];
          $address = $res['address'];
          $city = $res['fk_city_id'];
          $zip = $res['zip'];
          $customerphone = $res['customerphone'];

      }
      ?>



<div id="wrapper" class="toggled">

  <?php include "inc/sidenav.php"; ?>

  <!-- Page Content -->
  <div id="page-content-wrapper">
    <div class="container-fluid">
      <h1>Installatiebedrijf Hakkers - Klus </h1>



      <div class="row">
        <div class="col-md-4">




          <div class="form-group">
            <label for="exampleInputEmail1">Titel</label>
            <input name="title" id="title" type="text" class="form-control" value="<?php echo $title;?>" placeholder="Titel" readonly>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Monteur</label>
            <input readonly name="mechanic" id="mechanic" type="text" class="form-control" value="<?php echo $mechanic ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Type</label>
            <input readonly name="type" id="type" type="text" class="form-control" value="<?php echo $type ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Probleem</label>
            <textarea readonly name="problem" id="problem" type="text" class="form-control" placeholder="Probleem"><?php echo $problem;?></textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Datum</label>
            <input readonly name="date" id="date" type="date" class="form-control" value="<?php echo $date;?>" placeholder="Datum">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Tijd</label>
            <input readonly name="time" id="time" type="time" class="form-control" value="<?php echo $time;?>" placeholder="Tijdstip">
          </div>

        </div>
        <!-- end col-md-4 -->

        <div class="col-md-4">

          <div class="form-group">
            <label for="exampleInputEmail1">Naam klant</label>
            <input readonly name="customername" id="customername" type="text" class="form-control" value="<?php echo $customername;?>" placeholder="Naam">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Telefoonnummer klant</label>
            <input readonly name="customerphone" id="customerphone" type="number" class="form-control" value="<?php echo $customerphone;?>" placeholder="Telefoonnummer">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Adres</label>
            <input readonly name="address" id="address" type="text" class="form-control" value="<?php echo $address;?>" placeholder="Adres">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Woonplaats</label>
            <input readonly name="city" id="city" type="text" class="form-control" value="<?php echo $city ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Postcode</label>
            <input readonly name="zip" id="zip" type="text" class="form-control" value="<?php echo $zip;?>" placeholder="Postcode">
          </div>

        </div>
        <!-- end col-md-4 -->


      </div>
      <!-- end row -->

      <br>
      <a href="index.php" class="btn btn-primary">Terug naar home</a>
      <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>

    </div>
    <!-- end container-fluid -->

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










<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>

</body>

</html>
