<!DOCTYPE html>
<html>
	<head>
		<title>Sign Up</title>
		<meta charset="UTF-8">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../style/style.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</head>
	<body style="overflow: scroll; overflow-x: hidden;">

		<div id="registration">
		<?php 
       
		
		if(isset($_GET["alert"])) {$msg = $_GET["alert"]; echo $msg;}
		 ?>
			<h2 id = "first"> Sign Up</h2>
			<form class = "form-group" action = "server.php" method = "POST" enctype='multipart/form-data'>
				
				<strong>Name</strong><input maxlength="20" minlength="2" id = "input1" type = "text" class = "form-control" name = "name" required="required" placeholder = "Enter your real name"></br>
				<strong>Surname</strong><input maxlength="20" minlength="2" id = "input1" type = "text" class = "form-control" name = "surname" required="required" placeholder = "Enter your real surname"></br>
				<strong>Login</strong><input maxlength="30" minlength="3" id = "input1" type = "text" class = "form-control" name = "username" required="required" placeholder = "Username"></br>
				<strong>Password</strong><input maxlength="20" minlength="6" id = "input1" type = "password"  pattern=".{6,}" title="Six or more characters" class = "form-control" name = "password1" required="required" placeholder = "Password"></br>
				<strong>Re-Write Password</strong><input maxlength="20" minlength="6"  id = "input1" type = "password"  title="Six or more characters" class = "form-control" name = "password2" required="required" placeholder = "Password"></br>
				<strong>E-mail</strong><input maxlength="30" id = "input1" type = "email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" class = "form-control" name = "email" required="required" placeholder = "Enter Correct E-mail"></br>

				<strong>Gender</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label class="radio-inline">
					<input type="radio" required="required" name="gender"  id="inlineRadio1" value="Male"> Male
				</label>
				&nbsp;
				<label class="radio-inline">
					<input type="radio" required="required" name="gender"  id="inlineRadio2" value="Female"> Female
				</label>

				<br></br>
				<strong>Personal ID</strong><input onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="11" minlength="11" id = "input1" type = "text"  class = "form-control" name = "personalid" required="required" placeholder = "Enter your personal ID"></br>
				<strong>Phone Number</strong><input onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="9" minlength="9" id = "input1" type = "text"  class = "form-control" name = "phonenumber" required="required" placeholder = "Enter correct phone number"></br>
				<strong>Date Of Birth</strong><input  id = "input1" type = "date" max="2005-12-31" class = "form-control" name = "birthdate" required="required" placeholder = ""></br>
				<strong>Photo</strong><input type = "file" class = "form-control" name = "photo"><br />
				<input id = "input1" type = "submit"  class = "btn btn-primary" name = "submit">
			</form>
		</div><br><br>


	</body>

</html>