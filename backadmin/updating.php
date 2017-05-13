<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	
</head>
<body>
<?php

	
 	$conn=mysql_pconnect("localhost","root");
	$dbconn=mysql_select_db("online_store");
	$select=mysql_query("select * from sawyobi");
	$raodenoba=mysql_num_rows($select);
  	$personebis_masivi=mysql_fetch_array($select);
	$saba =$_GET['ID'];
	//echo $saba;
	$select1=mysql_query("select * from qvekategoriebi where ID='$saba'");
	$news_array = mysql_fetch_array($select1);				
					echo "<div id='form4'>";

					if(isset($_GET["shetyobineba"])){ $msg=$_GET["shetyobineba"]; echo $msg;}
						echo "<div id='form2'>";
							echo "<h3 id = 'description1'>"."<strong>"."ქვეკატეგორია:"."</strong>".$personebis_masivi['dasaxeleba']."</h3>";
						echo "</div>";
						echo "<form action='update.php'  method='post' class = 'form-group' enctype='multipart/form-data'>";
							
							echo "<input type='text' name='Qvekategoria' class = 'form-control' placeholder='ქვედასახელება' value='$news_array[qve_dasaxeleba]'>"."<br />";
							//echo "<input type='checkbox' name='Status' class = 'form-control' placeholder='Status'>"."<br />";
							echo "<input type='text' name='Fasi' class = 'form-control' placeholder='ფასი' value='$news_array[fasi]'>"."<br/>";
							echo "<input type='text' name='Raodenoba' class = 'form-control' placeholder='რაოდენობა' value='$news_array[raodenoba]'>"."<br />";
							echo "<input type='file' name='photo' class = 'form-control'>"."<br />";
							echo "<input type='submit' value='Update' class = 'btn btn-success'>";
							echo "<input type='hidden' name='record_id' value='$saba'>";
						echo "</form>";//end of form
					echo "</div>";
				
 ?>
</body>
</html>
