<?php
	if(isset($_POST["permision"])){ $permision=$_POST["permision"];}
    if(isset($_POST["reason"])){ $reason=$_POST["reason"];}
    if(isset($_POST["id"])){ $id=$_POST["id"];}
    
    
	$conn=mysql_pconnect("localhost","root");
	$dbconn=mysql_select_db("online_store");
	$select=mysql_query("select * from permisions where Permision='$permision'");
	$mass=mysql_fetch_array($select);
	$per_id=$mass["per_id"];
	$update=mysql_query("update admin set Permision='$per_id', Status='$reason' where record_id='$id'");
	$msg="Dissmis Successfully";
	$msg1="Not Dissmis Successfully";
	if($update)
	{
		header("location:stuff_control.php?alert=$msg");
	}
	else header("location:stuff_control.php?alert=$msg1");
?>