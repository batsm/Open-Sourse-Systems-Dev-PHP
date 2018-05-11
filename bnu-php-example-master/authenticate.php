<?php

   session_start();
   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   // If the student has already been authenticated the $_SESSION['id'] variable
   // will been assigned their student id.

	$sid = mysqli_real_escape_string($conn, $_POST['txtid']);
	$spwd = mysqli_real_escape_string($conn, $_POST['txtpwd']);
	
   // redirect to index if $_POST values not set or $_SESSION['id'] is already set
   if (!isset($sid) || !isset($spwd) || isset($_SESSION['id'])) {
      header("Location: index.php");
	} else {
      if (validatelogin($sid, $spwd) == true) {
         // valid
         header("Location: index.php?return=success");
      } else {
         // invalid
         unset($_SESSION['id']);
         header("Location: index.php?return=fail");
      }
	}
?>
