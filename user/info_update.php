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

	if(isset($_GET["user_id"]))$user_id= $_GET["user_id"];
    $conn=mysql_pconnect("localhost","root");
    $dbconn=mysql_select_db("online_store");
    $user_select=mysql_query("select * from users where record_id=$user_id");
    $user_mass=mysql_fetch_array($user_select);
    echo "<div id='update_user'>";
    	
    	echo "<form action='update_user_action.php?user_id=$user_id' method='post' enctype='multipart/form-data'>";
    	echo "<input type='text' name='Name' value='$user_mass[Name]' class = 'form-control' placeholder='Name' style='width:100%;'>"."<br />";
        echo "<input type='text' name='Surname' value='$user_mass[Surname]' class = 'form-control' placeholder='Surname' style='width:100%;'>"."<br/>";
        echo "<input type='text' name='Username' value='$user_mass[Login]' class = 'form-control' placeholder='Username' style='width:100%;'>"."<br/>";
        echo "<input type='Email' name='Email' value='$user_mass[Email]' class = 'form-control' placeholder='Email' style='width:100%;'>"."<br/>";
        echo "<input type='text' name='Phonenumber' value='$user_mass[Phonenumber]' class = 'form-control' placeholder='Phonenumber' style='width:100%;'>"."<br/>";
        echo "<input type='text' name='Personalid' value='$user_mass[Personalid]' class = 'form-control' placeholder='Personalid' style='width:100%;'>"."<br/>";
        echo "<input type='date' name='Birthdate' value='$user_mass[Birthdate]' class = 'form-control' style='width:100%;'>"."<br/>";
        echo "<input type='file' name='photo' class = 'form-control' style='width:100%;'>"."<br/>";
		echo "<input type='submit' value='Update Info' class = 'btn btn-primary' style='width:100%;'>";
        echo "</form>";
        
    echo "</div>";

?>