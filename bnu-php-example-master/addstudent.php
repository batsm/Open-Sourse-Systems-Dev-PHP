<?php
   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

// check logged in
	if (isset($_SESSION['id'])) 
	{
		echo template("templates/partials/header.php");
		echo template("templates/partials/nav.php");

		// if the form has been submitted
		if(isset($_POST['submit'])) 
		{
			$sid = mysqli_real_escape_string($conn, $_POST[txtstudentid]);
			$spassword = mysqli_real_escape_string($conn, $_POST[txtpassword]);
			$sdob = mysqli_real_escape_string($conn, $_POST[txtdob]);
			$sfirstname = mysqli_real_escape_string($conn, $_POST[txtfirstname]);
			$slastname = mysqli_real_escape_string($conn, $_POST[txtlastname]);
			$shouse = mysqli_real_escape_string($conn, $_POST[txthouse]);
			$stown = mysqli_real_escape_string($conn, $_POST[txttown]);
			$scounty = mysqli_real_escape_string($conn, $_POST[txtcounty]);
			$scountry = mysqli_real_escape_string($conn, $_POST[txtcountry]);
			$spostcode = mysqli_real_escape_string($conn, $_POST[txtpostcode]);
			
			$sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode) VALUES (";
			$sql .= "'" . $sid . "','" . password_hash($spassword) . "','" . $sdob . "','" . $sfirstname . "','" . $slastname . "','" . $shouse . "','" . $stown . "','" . $scounty . "','" . $scountry . "','" . $spostcode . "'";
			$sql .= ");";
		
			if ($conn->query(mysqli_real_escape_string($sql)) === TRUE) 
			{
				echo "Successfully created record";
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		} 
		else 
		{
			$data['content'] = <<<EOD
			<div class='container' style='padding-top: 25px'>
			<div class='jumbotron'>
			<h1 style="padding-bottom: 25px;">My Details</h1>
			<form name="frmdetails" action="" method="post">
			<h5>StudentID :</h5>
			<input name="txtstudentid" type="text" class="form-control" value="" /><br/>
			<h5>Password :</h5>
			<input name="txtpassword" type="text" class="form-control" value="" /><br/>
			<h5>Date of Birth :</h5>
			<input name="txtdob" type="text" class="form-control" ="" /><br/>
			<h5>First Name :</h5>
			<input name="txtfirstname" type="text" class="form-control" value="" /><br/>
			<h5>Surname :</h5>
			<input name="txtlastname" type="text" class="form-control" value="" /><br/>
			<h5>Number and Street :</h5>
			<input name="txthouse" type="text" class="form-control" value="" /><br/>
			<h5>Town :</h5>
			<input name="txttown" type="text" class="form-control" value="" /><br/>
			<h5>County :</h5>
			<input name="txtcounty" type="text" class="form-control" value="" /><br/>
			<h5>Country :</h5>
			<input name="txtcountry" type="text" class="form-control" value="" /><br/>
			<h5>Postcode :</h5>
			<input name="txtpostcode" type="text" class="form-control" value="" /><br/>
			<input type="submit" value="Save" class='btn btn-outline-secondary' name="submit"/>
			</form>
			</div>
			</div>
EOD;
		}

		// render the template
		echo template("templates/default.php", $data);
		} 
		else 
		{
			header("Location: index.php");
		}

	echo template("templates/partials/footer.php");

?>