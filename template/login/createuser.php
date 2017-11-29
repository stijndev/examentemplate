<?php
require 'includes/functions.php';
include 'config.php';


//Pull username, generate new ID and hash password
$newuser = $_POST['newuser'];
$newpw = password_hash($_POST['password1'], PASSWORD_DEFAULT);
$pw1 = $_POST['password1'];
$pw2 = $_POST['password2'];
$newfirstname = $_POST['newfirstname'];
$newlastname = $_POST['newlastname'];
$newphone = $_POST['newphone'];
$newspecialty = $_POST['newspecialty'];



//Enables moderator verification (overrides user self-verification emails)
if (isset($admin_email)) {

    $newemail = $admin_email;

} else {

    $newemail = $_POST['email'];

}
//Validation rules
if ($pw1 != $pw2) {

    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password fields must match</div><div id="returnVal" style="display:none;">false</div>';

} elseif (strlen($pw1) < 4) {

    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password must be at least 4 characters</div><div id="returnVal" style="display:none;">false</div>';

} elseif (!filter_var($newemail, FILTER_VALIDATE_EMAIL) == true) {

    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Must provide a valid email address</div><div id="returnVal" style="display:none;">false</div>';

} else {
    //Validation passed
    if (isset($_POST['newuser']) && !empty(str_replace(' ', '', $_POST['newuser'])) && isset($_POST['password1']) && !empty(str_replace(' ', '', $_POST['password1']))) {

        //Tries inserting into database and add response to variable

        $a = new NewUserForm;

        $response = $a->createUser($newuser, $newemail, $newpw, $newfirstname, $newlastname, $newphone, $newspecialty);


        //Success
        if ($response == 'true') {
            echo '<link href="../css/bootstrap.css" rel="stylesheet" media="screen">';
            echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'. $signupthanks .'</div><div id="returnVal" style="display:none;">true</div> <br> <a href="main_login.php" class="btn btn-primary">Inloggen</a> <a href="../index.php" class="btn btn-primary">Home</a>';
            echo '<p><strong>Je wordt automatisch doorverwezen in 5 seconden.</strong></p>';
            echo '<script>
            window.setTimeout(function() {
              window.location = "main_login.php";
            }, 5000);
            </script>';

         } else {
            //Failure

            mySqlErrors($response);
        }
    } else {
        //Validation error from empty form variables
        echo 'An error occurred on the form... try again';
    }
};
