<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   echo template("templates/partials/header.php");

   if (isset($_GET['return'])) {
      $msg = "";
      if ($_GET['return'] == "fail") {$msg = "<div class='alert alert-danger'> <strong>Error:</strong> Login Failed. Please try again.</div>";}
      $data['message'] = "<p>$msg</p>";
   }

   if (isset($_SESSION['id'])) {
      $data['content'] = "<div class='container' style='padding-top: 25px'> <div class='jumbotron'> <h1 style='text-align:center;'>Welcome to your dashboard.</h1> </div></div>";
      echo template("templates/partials/nav.php");
      echo template("templates/default.php", $data);
   } else {
      echo template("templates/login.php", $data);
   }

   echo template("templates/partials/footer.php");

?>
