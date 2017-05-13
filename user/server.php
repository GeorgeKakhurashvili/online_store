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
	

$max_height = 200;
$max_width = 200;
if(isset($_FILES['photo']))
 {
   $photo=$_FILES['photo'];
   $file_type=$_FILES['photo']['type'];
   $file_name=$_FILES['photo']['name'];
   $file_temp_name=$_FILES['photo']['tmp_name'];
   $file_size=$_FILES['photo']['size'];
   if($file_type=="image/jpeg")
    {
    $new_file_name="../users_images/users/f_".time("U").".jpg";
    $new_img_name="f_".time("U").".jpg";
    $upl_img=move_uploaded_file($file_temp_name, $new_file_name);
    list($width,$height)=getimagesize($new_file_name);
    if ($width > $height) {
      $newheigh = $height/($width/$max_width);
      $newwidth = $max_width;
    }
    else
    {
      $newwidth = $width/($height/$max_height);
      $newheigh = $max_height;
    }

    $smallimage=imagecreatetruecolor($newwidth, $newheigh);
    
    $img_source=imagecreatefromjpeg($new_file_name);

    $resized_img=imagecopyresampled($smallimage, $img_source, 0, 0, 0, 0, $newwidth, $newheigh, $width, $height);
    imagejpeg($smallimage,$new_file_name);
    
	}
}

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
	

	
	$insert = "INSERT INTO `users` (`Name`, `Surname`, `Login`, `Password1` , `Password2` , `Email` , `Gender` ,  `Personalid` , `Phonenumber` , `Birthdate` , `Registrationdate`, `img_link`)
	VALUES ('$name', '$surname', '$username', '$password1', '$password2' , '$email' , '$gender', '$personalid' ,  '$phonenumber' ,  '$birthdate' ,  '$registrationdate', 
	'$new_file_name')";
  
 	
 	mysqli_query($conn, $insert);
 	mysqli_close($conn);
 	$msg="sign up successfully";
 	header("location: form.php?alert=$msg");
 	

  ?>