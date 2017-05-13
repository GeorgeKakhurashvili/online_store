<?php
	
 	$conn=mysql_pconnect("localhost","root");
	$dbconn=mysql_select_db("online_store");

	if (!$conn) {
	    die("Connection failed: " . mysql_connect_error());
	}

	$id = $_GET['ID'];
	$select=mysql_query("delete from qvekategoriebi where ID='$id'");
	mysql_close($conn);
	header("location: index.php");
?>