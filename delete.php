<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <head>
        <meta charset="UTF-8" /> 
        <title></title>
        <link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
    </head>
<?php
	
 	$conn=mysql_pconnect("localhost","root");
	$dbconn=mysql_select_db("online_store");
	$id = $_GET['record_id'];
	$select=mysql_query("select * from admin where record_id='$id'");
	$raod=mysql_num_rows($select);
	$mass=mysql_fetch_array($select);
	$perm=$mass["Permision"];
	$per_select=mysql_query("select * from permisions where per_id='$perm'");
	$per_mass=mysql_fetch_array($per_select);
	$permision=$per_mass["Permision"];
	$per_id=$per_mass["per_id"];


	if($permision=="Dissmis"){$diss=1; header("Location:stuff_control.php?alert1=$diss");}
		else {
	echo "<center>";
		echo "<div id='dissmis'>";
			echo "<h2>Dissmis person</h2>"."<br />";
			echo "<form action='dissmis_action.php' method='post'>";
				echo "<select class = 'form-control' name='permision'>";
					echo "<option value='$permision'>$permision</option>";
					echo "<option value='Dissmis'>Dissmis</option>";
				echo "</select><br />";
				echo "<textarea rows='8' placeholder='Reason of Dissmis' class = 'form-control' name='reason'>";


				echo "</textarea>"."<br />";
				echo "<input type='hidden' value='$id' name='id'>";
				echo "<input type='hidden' value='$per_id' name='per_id'>";
				echo "<input type='submit' class = 'btn btn-primary' style='width:100%;' value='Dissmis'>";
			echo "</form>";
		echo "</div>";
		}
		
				
				  
				
	mysql_close($conn);
	//header("location: index.php");
?>