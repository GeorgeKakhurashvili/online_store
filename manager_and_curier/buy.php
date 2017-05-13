<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script type="text/javascript">
	function saerto_jami () {
		var raod=document.getElementById("all").value;
		var fasi=document.getElementById("fasi").value;
		document.getElementById("jami").innerHTML = raod*fasi;
	}
	</script>
</head>
<body>
<?php 
$conn=mysql_pconnect("localhost","root");
$dbconn=mysql_select_db("online_store");
$select1=mysql_query("select * from qvekategoriebi"); 
$raodenoba1=mysql_num_rows($select1);
for ($j=0; $j <$raodenoba1 ; $j++) 
					{ 
						$news_array1 = mysql_fetch_array($select1);
						$qve_dasaxeleba = $news_array1["qve_dasaxeleba"];
						

					}
					
echo "<div id='main1'>";
	echo "<div id='main'>";
		echo "<div id='form1'>";
			echo "<form method='post' action='search.php' target='ifr'>";
				echo "<input type='text' name='Dasaxeleba' class = 'form-control' placeholder='შტრიხკოდი'>"."<br />";
				echo "<td align=\"center\" valign=\"middle\"  height='70'>"."<input type='submit' value='Search' class = 'btn btn-primary'>"."<br />"."<br />";
			echo "</form>";
			echo "<form method='post' action='finish_manager.php' target='_blanck'>";
					echo "<td align=\"center\" valign=\"middle\"  height='70'>"."<input type='submit' value='finish' class = 'btn btn-primary'>";				
			echo "</form>";
		echo "</div>";
	echo "</div>";

	echo "<div id='table'>";
			echo "<iframe name='ifr' src='http://localhost/online_store/manager_and_curier/search.php'  width='100%' height='auto' frameborder='0'>";

		echo "</div>";
echo "</div>";
?>

</body>
</html>