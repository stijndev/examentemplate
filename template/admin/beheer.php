<?php require 'admn_inc/admin_loginheader.php';
      include_once 'functions.php';
      include 'admn_inc/admin_header.php';
      $admin = new Admin();

      $query = "SELECT * FROM members WHERE planner = 0";
      $result = $admin->displayMechanics($query);

      $tQuery = "SELECT * FROM type";
      $tResult = $admin->displayTypes($tQuery);

      $cQuery = "SELECT * FROM city";
      $cResult = $admin->displayCities($cQuery);
      ?>

<div id="wrapper" class="toggled">

  <?php include "admn_inc/admin_nav.php"; ?>

  <div id="page-content-wrapper">

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <div class="container-fluid">
        <h1>Installatiebedrijf Hakkers - Klus aanmaken</h1>
      </div>
      <!-- end container-fluid -->

      <div class="row">
        <div class="col-md-4">

          <form class="form-signup" id="jobcreate" name="jobcreate" method="post" action="admn_inc/job_create.php">
            <label for="">Klus gegevens</label>
            <div class="form-group">
              <input name="title" id="title" type="text" class="form-control" placeholder="Titel" autofocus>
            </div>

            <!-- <div class="form-group">
              <input name="mechanic" id="mechanic" type="text" class="form-control" placeholder="Monteur">
            </div> -->
            <div class="form-group">
              <select name="mechanic" id="mechanic" class="form-control">
                <?php
                foreach($result as $key => $res) {
                  echo '<option value="'. $res['id'] .'" >'. $res['firstname'] .' '. $res['lastname'] .'</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group">
              <select name="type" id="type" class="form-control">
              <?php
              foreach($tResult as $key => $res) {
                echo '<option value="'. $res['id'] .'" >'. $res['jobtype'] .'</option>';
              }
              ?>
            </select>
            </div>

            <div class="form-group">
              <textarea name="problem" id="problem" type="text" class="form-control" placeholder="Probleem"></textarea>
            </div>

            <div class="form-group">
              <input name="date" id="date" type="date" class="form-control" placeholder="Datum">
            </div>

            <div class="form-group">
              <input name="time" id="time" type="time" class="form-control" placeholder="Tijdstip">
            </div>

        </div>
        <!-- end col-md-4 -->

        <div class="col-md-4">
          <label for="">Adres gegevens</label>
          <div class="form-group">
            <input name="customername" id="customername" type="text" class="form-control" placeholder="Naam">
          </div>

          <div class="form-group">
            <input name="address" id="address" type="text" class="form-control" placeholder="Adres">
          </div>

          <div class="form-group">
            <!-- <input name="city" id="city" type="text" class="form-control" placeholder="Woonplaats"> -->
            <select name="city" id="city" class="form-control">
            <?php
            foreach($cResult as $key => $res) {
              echo '<option value="'. $res['id'] .'" >'. $res['cityname'] .'</option>';
            }
            ?>
          </select>
          </div>

          <div class="form-group">
            <input name="zip" id="zip" type="text" class="form-control" placeholder="Postcode">
          </div>

          <div class="form-group">
            <input name="customerphone" id="customerphone" type="number" class="form-control" placeholder="Telefoonnummer">
          </div>

          <button name="save" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Aanmaken</button>

        </div>
        <!-- end col-md-4 -->

        </form>

      </div>
      <!-- end row -->


      <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>

    </div>
    <!-- end page-content-wrapper -->



  </div>
  <!-- /#wrapper -->


  <?php include "admn_inc/admin_scripts.php"; ?>

  <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
  <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

  <script>
    $("#jobcreate").validate({
      rules: {
        title: {
          required: true
        },
        mechanic: {
          required: true
        },
        type: {
          required: true
        },
        problem: {
          required: true
        },
        date: {
          required: true
        },
        time: {
          required: true
        },
        address: {
          required: true
        },
        city: {
          required: true
        },
        zip: {
          required: true
        },
        customerphone: {
          required: true
        },
        customername: {
          required: true
        }
      }
    });

    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>



  </body>

  </html>
