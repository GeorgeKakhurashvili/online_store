<?php  
if(isset($_GET["user_id"]))$user_id= $_GET["user_id"];
$conn=mysql_pconnect("localhost","root");
$dbconn=mysql_select_db("online_store");
$user_select=mysql_query("select * from users where record_id=$user_id");
$user_mass=mysql_fetch_array($user_select);  
$user_email=$user_mass["Email"];
if(isset($_POST["email"])){$Email=$_POST["email"];}
if(isset($_POST["Password"])){$Password=$_POST["Password"];}
if(isset($_POST["Password1"])){$Password1=$_POST["Password1"];}
if($user_email!=$Email)
{

	$msg= "Enter correct Email";
	header("Location:update_password.php?alert=$msg&user_id=$user_id");
}
else if($Password!=$Password1)
{
	$msg= "Enter similar passwords";
	header("Location:update_password.php?alert=$msg&user_id=$user_id");
}
else
{
	$update_pass=mysql_query("update users set Password1='$Password', Password2='$Password1'");
	if($update_pass)
	{
		$msg= "Password Updated Succesfully";
		header("Location:update_password.php?alert=$msg&user_id=$user_id");
	}
}
?>