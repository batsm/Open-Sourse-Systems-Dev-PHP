<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   // If a module has been selected
   if (isset($_POST['selmodule'])) 
   {
	  $sselModule = mysqli_real_escape_string($conn, $_POST['selmodule']);
      $sql = "insert into studentmodules values ('" .  $_SESSION['id'] . "','" . $sselModule . "');";
      $result = mysqli_query($conn, $sql);
      $data['content'] .= "<p>The module " . $sselModule . " has been assigned to you</p>";
   }
   else  // If a module has not been selected
   {

     // Build sql statment that selects all the modules
     $sql = "select * from module";
     $result = mysqli_query($conn, $sql);

	 $data['content'] .= "<div class='container' style='padding-top: 25px'>";
	 $data['content'] .= "<div class='jumbotron'>";
     $data['content'] .= "<form name='frmassignmodule' action='' method='post' >";
     $data['content'] .= "<h1>Select a module to assign</h1><br/>";
     $data['content'] .= "<select class='form-control' name='selmodule' >";
     // Display the module name sin a drop down selection box
     while($row = mysqli_fetch_array($result)) {
        $data['content'] .= "<option value='$row[modulecode]'>$row[name]</option>";
     }
     $data['content'] .= "</select><br/>";
     $data['content'] .= "<input type='submit' class='btn btn-outline-secondary' name='confirm' value='Save' />";
     $data['content'] .= "</form>";
	 $data['content'] .= "</div>";
	 $data['content'] .= "</div>";
   }

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
