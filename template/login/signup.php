<?php
   session_start();

  if (isset($_SESSION['username'])) {
      session_start();
      session_destroy();
  }

  include_once "../admin/functions.php";
  $admin = new Admin();

  //fetching data in descending order (lastest entry first)
  $query = "SELECT * FROM specialty";
  $result = $admin->displaySpecialty($query);


  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registreren</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/main.css" rel="stylesheet" media="screen">
  </head>

  <body>
    <div class="container">


      <form class="form-signup" id="usersignup" name="usersignup" method="post" action="createuser.php">
        <h2 class="form-signup-heading">Registreren</h2>
        <input name="newfirstname" id="newfirstname" type="text" class="form-control" placeholder="Voornaam" autofocus>
        <input name="newlastname" id="newlastname" type="text" class="form-control" placeholder="Achternaam">
        <input name="newphone" id="newphone" type="number" class="form-control" placeholder="Telefoonnummer">
        <!-- <input name="newspecialty" id="newspecialty" type="number" class="form-control" placeholder="Specialiteit"> -->
        <select name="newspecialty" id="newspecialty" type="text" class="form-control">
          <option value="Specialiteiten">Alle specialiteiten</option>
          <?php
          foreach($result as $key => $res) {
            echo '<option value="'. $res['id'] .'" >'. $res['specialty'] .'</option>';
          }
          ?>
        </select>
<br>
        <input name="newuser" id="newuser" type="text" class="form-control" placeholder="Gebruikersnaam">
        <input name="email" id="email" type="text" class="form-control" placeholder="Email">
<br>
        <input name="password1" id="password1" type="password" class="form-control" placeholder="Wachtwoord">
        <input name="password2" id="password2" type="password" class="form-control" placeholder="Herhaal wachtwoord">

        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Registreren</button>

        <div id="message"></div>
      </form>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <!-- <script src="js/signup.js"></script> -->


<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script>

$( "#usersignup" ).validate({
  rules: {
	email: {
		email: true,
		required: true
	},
    password1: {
      required: true,
      minlength: 4
	},
    password2: {
      equalTo: "#password1"
    },
    newfirstname: {
      required:true
    },
    newlastname: {
      required:true
    },
    newphone: {
      required:true
    },
    newspecialty: {
      required:true
    },
  }
});
</script>

  </body>
</html>
