
<?php echo $message; ?>

<form name="frmLogin" action="authenticate.php" method="post">
   <div class='container' style='padding-top: 25px'>
   <div class='jumbotron'>
   <h1 style='padding-bottom: 25px'> Login:</h1>
   <h5>Student ID:</h5>
   <input name="txtid" class="form-control" type="text" />
   <br/>
   <h5>Password:</h5>
   <input name="txtpwd" class="form-control" type="password" />
   <br/>
   <input type="submit" value="Login" class='btn btn-outline-secondary' name="btnlogin" />
   </div>
   </div>
</form>
