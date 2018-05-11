<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");



   // check logged in
   if (isset($_SESSION['id'])) {
	   if(isset($_POST['delete_student_id'])) {
		   foreach($_POST['delete_student_id'] as $current) {
			   $sql = "DELETE FROM student WHERE studentid=" . $current . ";";
			   $result = mysqli_query($conn,$sql);
		   }
	   }
   
      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects a student's modules
      $sql = "SELECT * FROM student;";

      $result = mysqli_query($conn,$sql);

      // prepare page content
	  $data['content'] .= "<div class='container' style='padding-top: 25px'>";
	  $data['content'] .= "<form action='' method='post'>";
      $data['content'] .= "<table class='table table-hover table-striped table-bordered'>";
      $data['content'] .= "<tr><th colspan='10' align='center'>Students</th></tr>";
      $data['content'] .= "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>House</th><th>Town</th><th>County</th><th>Country</th><th>Postcode</th><th>Delete</th></tr>";
      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr><td> $row[studentid] </td><td> $row[firstname] </td><td> $row[lastname] </td><td> $row[dob] </td><td> $row[house] </td><td> $row[town] </td><td> $row[county] </td><td> $row[country] </td><td> $row[postcode] </td><td> <center><input id='checkBox' value='$row[studentid]' name='delete_student_id[]' type='checkbox' class='form-check-input'></center> </td></tr>";
      }
      $data['content'] .= "</table>";
	  $data['content'] .= "</br><input type='submit' value='Delete' class='btn btn-outline-secondary'>";
	  $data['content'] .= "</form>";
	  $data['content'] .= "</div>";
		
      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
