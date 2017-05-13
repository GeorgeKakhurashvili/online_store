<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <head>
        <meta charset="UTF-8" /> 
        <title></title>
        <link rel="icon" href="photo/logo1-2.png"> 
        <link rel="stylesheet" type="text/css" href="style_user.css" />
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        
    </head>
<?php

	
    echo "<div id='update_user'>";
    	echo "<center>";
    	if(isset($_GET["alert"])){$msg=$_GET["alert"]; echo $msg;}
    	echo "</center>"; 
    	echo "<form action='update_password_action.php?user_id=$user_id' method='post'>";
    	echo "<input type='email' name= 'email' placeholder='Email' class = 'form-control' style='width:100%;'>"."<br/>";
		echo "<input type='password' name='Password' class = 'form-control' placeholder='Password' style='width:100%;'>"."<br/>";
		echo "<input type='password' name='Password1' class = 'form-control' placeholder='Confirm Password' style='width:100%;'>"."<br/>";
		echo "<input type='submit' value='Update Password' class = 'btn btn-primary' style='width:100%;'>";
        echo "</form>";
	echo "</div>";
?>