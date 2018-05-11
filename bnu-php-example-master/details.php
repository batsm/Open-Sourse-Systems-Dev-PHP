<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   // if the form has been submitted
   if (isset($_POST['submit'])) {

	  $sfirstname = mysqli_real_escape_string($conn, $_POST['txtfirstname']);
      $slastname = mysqli_real_escape_string($conn, $_POST['txtlastname']);
      $shouse = mysqli_real_escape_string($conn, $_POST['txthouse']);
      $stown = mysqli_real_escape_string($conn, $_POST['txttown']);
	  $scounty = mysqli_real_escape_string($conn, $_POST['txtcounty']);
	  $scountry = mysqli_real_escape_string($conn, $_POST['txtcountry']);
	  $spostcode = mysqli_real_escape_string($conn, $_POST['txtpostcode']);
	  
      // build an sql statment to update the student details
      $sql = "update student set firstname ='" . $sfirstname . "',";
      $sql .= "lastname ='" . $slastname  . "',";
      $sql .= "house ='" . $shouse  . "',";
      $sql .= "town ='" . $stown  . "',";
      $sql .= "county ='" . $scounty  . "',";
      $sql .= "country ='" . $scountry  . "',";
      $sql .= "postcode ='" . $spostcode  . "' ";
      $sql .= "where studentid = '" . $_SESSION['id'] . "';";
      $result = mysqli_query($conn,$sql);

      $data['content'] = "<p>Your details have been updated</p>";

   }
   else {
      // Build a SQL statment to return the student record with the id that
      // matches that of the session variable.
      $sql = "select * from student where studentid='". $_SESSION['id'] . "';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      // using <<<EOD notation to allow building of a multi-line string
      // see http://stackoverflow.com/questions/6924193/what-is-the-use-of-eod-in-php for info
      // also http://stackoverflow.com/questions/8280360/formatting-an-array-value-inside-a-heredoc
      $data['content'] = <<<EOD

   <div class='container' style='padding-top: 25px'>
   <div class='jumbotron'>
   <h1 style="padding-bottom: 25px;">My Details</h1>
   <form name="frmdetails" action="" method="post">
   <h5>First Name :</h5>
   <input name="txtfirstname" type="text" class="form-control" value="{$row['firstname']}" /><br/>
   <h5>Surname :</h5>
   <input name="txtlastname" type="text"  class="form-control" value="{$row['lastname']}" /><br/>
   <h5>Number and Street :</h5>
   <input name="txthouse" type="text"  class="form-control" value="{$row['house']}" /><br/>
   <h5>Town :</h5>
   <input name="txttown" type="text"  class="form-control" value="{$row['town']}" /><br/>
   <h5>County :</h5>
   <input name="txtcounty" type="text"  class="form-control" value="{$row['county']}" /><br/>
   <h5>Country :</h5>
   <input name="txtcountry" type="text"  class="form-control" value="{$row['country']}" /><br/>
   <h5>Postcode :</h5>
   <input name="txtpostcode" type="text"  class="form-control" value="{$row['postcode']}" /><br/>
   <input type="submit" value="Save" class='btn btn-outline-secondary' name="submit"/>
   </form>
   </div>
   </div>

EOD;

   }

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
