<?php  
	$conn=mysql_pconnect("localhost","root");
    $dbconn=mysql_select_db("online_store");
    if(isset($_POST["Name"])) $Name = $_POST["Name"];
 	if(isset($_POST["Surname"])) $Surname = $_POST["Surname"];
 	if(isset($_POST["Email"])) $Email = $_POST["Email"];
 	if(isset($_POST["Personal_id"])) $Personal_id = $_POST["Personal_id"];
 	if(isset($_POST["Phone"])) $Phone = $_POST["Phone"];
 	if(isset($_POST["birthdate"])) $birthdate = $_POST["birthdate"];
 	if(isset($_POST["permision"])) $permision = $_POST["permision"];
 	if(isset($_POST["reason"])) $reason = $_POST["reason"];
 	echo $reason;
 	$select=mysql_query("select * from permisions where Permision='$permision'");
 	$mass=mysql_fetch_array($select);
	$per_id=$mass["per_id"];

 	$update=mysql_query("update admin set Name='$Name', Surname='$Surname', Email='$Email', Personalid='$Personal_id', Phonenumber='$Phone', Birthdate='$birthdate', Permision='$per_id', Status='$reason'");
 	
 	$msg="Updated Successfully";
	$msg1="Not Updated Successfully";
	if($update)
	{
		header("location:stuff_control.php?alert=$msg");
	}
	else header("location:stuff_control.php?alert=$msg1");
?>