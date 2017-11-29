<?php require 'admn_inc/admin_loginheader.php';
      include_once 'functions.php';
      include 'admn_inc/admin_header.php';
      $admin = new Admin();

      // queries + functions aanroepen
      $mQuery = "SELECT * FROM members WHERE planner = 0";
      $mResult = $admin->displayMechanics($mQuery);

      $cQuery = "SELECT * FROM city";
      $cResult = $admin->displayCities($cQuery);

      $tQuery = "SELECT * FROM type";
      $tResult = $admin->displayTypes($tQuery);


      //id ophalen via url
      $id = $admin->escape_string($_GET['id']);

      //selecting data associated with this particular id
      $result = $admin->displayJobs("SELECT * FROM jobs WHERE id=$id");

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

<?php include "admn_inc/admin_nav.php"; ?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <h1>Installatiebedrijf Hakkers - Beheer</h1>



				<div class="row">
					<div class="col-md-4">

						<form class="form-signup" id="editjob" name="editjob" method="post" action="editaction.php">

              <div class="form-group">
                <input name="id" id="id" type="text" class="form-control" hidden="" value=<?php echo $id;?> placeholder="" >
              </div>

              <div class="form-group">
								<input name="title" id="title" type="text" class="form-control" value="<?php echo $title;?>" placeholder="Titel" autofocus>
							</div>

							<div class="form-group">
                <select name="mechanic" id="mechanic" class="form-control">
                  <?php
                  foreach($mResult as $key => $mRes) {
                    echo '<option value="'. $mRes['id'] .'" >'. $mRes['firstname'] .'</option>';
                  }
                  ?>
                </select>
							</div>

							<div class="form-group">
								<!-- <input name="type" id="type" type="text" class="form-control" value=""placeholder="Type"> -->

                <select name="type" id="type" class="form-control">
                  <?php
                  foreach($tResult as $key => $tRes) {
                    echo '<option value="'. $tRes['id'] .'" >'. $tRes['jobtype'] .'</option>';
                  }
                  ?>
                </select>
							</div>

							<div class="form-group">
								<textarea name="problem" id="problem" type="text" class="form-control" placeholder="Probleem"><?php echo $problem;?></textarea>
							</div>

							<div class="form-group">
								<input name="date" id="date" type="date" class="form-control" value="<?php echo $date;?>" placeholder="Datum">
							</div>

							<div class="form-group">
								<input name="time" id="time" type="time" class="form-control" value="<?php echo $time;?>" placeholder="Tijdstip">
							</div>

					</div>
					<!-- end col-md-4 -->

					<div class="col-md-4">

						<div class="form-group">
							<input name="customername" id="customername" type="text" class="form-control" value="<?php echo $customername;?>" placeholder="Naam">
						</div>

						<div class="form-group">
							<input name="address" id="address" type="text" class="form-control" value="<?php echo $address;?>" placeholder="Adres">
						</div>

						<div class="form-group">
							<!-- <input name="city" id="city" type="text" class="form-control" value="" placeholder="Woonplaats"> -->
              <select name="city" id="city" class="form-control">
                <?php
                foreach($cResult as $key => $cRes) {
                  echo '<option value="'. $cRes['id'] .'" >'. $cRes['cityname'] .'</option>';
                }
                ?>
              </select>

						</div>

						<div class="form-group">
							<input name="zip" id="zip" type="text" class="form-control" value="<?php echo $zip;?>" placeholder="Postcode">
						</div>

						<div class="form-group">
							<input name="customerphone" id="customerphone" type="number" class="form-control" value="<?php echo $customerphone;?>" placeholder="Telefoonnummer">
						</div>

						<button name="update" id="update" class="btn btn-lg btn-primary btn-block" type="submit">Update</button>

					</div>
					<!-- end col-md-4 -->

					</form>

				</div>

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











<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
