<?php
 	
 	$conn = mysqli_connect("localhost", "root", "", "online_store");
 	

 	
 	if(isset($_POST["name"])) $name = $_POST["name"];
 	if(isset($_POST["surname"])) $surname = $_POST["surname"];
 	if(isset($_POST["username"])) $username = $_POST["username"];
 	if(isset($_POST["password1"])) $password1 = $_POST["password1"];
 	if(isset($_POST["password2"])) $password2 = $_POST["password2"];
 	if(isset($_POST["email"])) $email = $_POST["email"];
 	if($_POST["gender"] == "Male") $gender = "Male"; 
	else if($_POST["gender"] == "Female") $gender = "Female";
 	if(isset($_POST["personalid"])) $personalid = $_POST["personalid"];
 	if(isset($_POST["phonenumber"])) $phonenumber = $_POST["phonenumber"];
 	if(isset($_POST["birthdate"])) $birthdate = $_POST["birthdate"];
	$registrationdate = date("Y-m-d h:i:sa");
	if(isset($_POST["birthdate"])) $birthdate = $_POST["birthdate"];
	if(isset($_POST["permision"])) $permision = $_POST["permision"];

	//This code runs if the form has been submitted

	/*if  (isset($_POST['submit'])) { 

		// checks if the username is in use  

		 if (!get_magic_quotes_gpc()){ 
			$_POST['username'] = addslashes($_POST['username']);  
		}  $usercheck = $_POST['username']; 

		$check = mysql_query("SELECT Username FROM signup WHERE username = '$usercheck'")  
		or die(mysql_error());  $check2 = mysql_num_rows($check);   

		//if the name exists it gives an error 

		if ($check2 != 0){  
			die('Sorry, the username '.$_POST['username'].' is already in use.');  
		}   
		*/
		//  this makes sure both passwords entered match 

		if ($_POST['password1'] != $_POST['password2']){ 
			die('Your passwords did not match. ');  
			
		}
		
	//}
	$select=mysql_query("select * from permisions");
	$permision_raod=mysql_num_rows($select);
	for ($i=0; $i < $permision_raod; $i++) 
	{ 
		$mass=mysql_fetch_array($select);
	}
	

	
	$insert = "INSERT INTO `admin` (`Name`, `Surname`, `Login`, `Password` , `Password1` , `Email` , `Gender` ,  `Personalid` , `Phonenumber` , `Birthdate` , `Registrationdate`, `Permision`)
	VALUES ('$name', '$surname', '$username', '$password1', '$password2' , '$email' , '$gender', '$personalid' ,  '$phonenumber' ,  '$birthdate' ,  '$registrationdate', '$permision')";
  	$insert1 = "INSERT INTO `curiers` (`Login`,`Name`, `Surname` ) VALUES ('$username','$name', '$surname')";
 	
 	mysqli_query($conn, $insert);
 	mysqli_query($conn, $insert1);
 	mysqli_close($conn);
 	$msg="sign up successfully";
 	header("location: form.php?alert=$msg");
 	

  ?>