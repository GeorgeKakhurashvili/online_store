<?php  
if(isset($_GET["user_id"]))$user_id= $_GET["user_id"];
$conn=mysql_pconnect("localhost","root");
$dbconn=mysql_select_db("online_store");
if(isset($_POST["Name"])) $name = $_POST["Name"];
if(isset($_POST["Surname"])) $surname = $_POST["Surname"];
if(isset($_POST["Username"])) $username = $_POST["Username"];
if(isset($_POST["Email"])) $email = $_POST["Email"];
if(isset($_POST["Personalid"])) $personalid = $_POST["Personalid"];
if(isset($_POST["Phonenumber"])) $phonenumber = $_POST["Phonenumber"];
if(isset($_POST["Birthdate"])) $birthdate = $_POST["Birthdate"];
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
$update_user=mysql_query("update users set Name='$name', Surname='$surname', Login='$username', Email='$email', Personalid='$personalid', Phonenumber='$phonenumber', Birthdate='$birthdate', img_link='$new_file_name'");
if($update_user)
{
	
	header("Location:user_page.php?user_id=$user_id");
}
else
{
	$msg="Info Not Updated Successfully, Please Try Again!";
	header("Location:info_update.php?alert=$msg&user_id=$user_id");
}
?>