<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>

<center><h1>საწყობიდან გატანილი პროდუქცია</h1></center>
<br/>
<?php
$conn=mysql_pconnect("localhost","root");
$dbconn=mysql_select_db("online_store");
if(isset($_GET["alert"])){$msg=$_GET["alert"]; echo $msg."<br />";}
$shes_select=mysql_query("select * from shesrulebadi");
echo "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">";
	for($i=0; $i<1; $i++)
		{
					
					

					$raodenoba1=mysql_num_rows($shes_select);
					if($raodenoba1>0)
					{
					echo "<tr>"."<th>"."Product"."</th>"."<th>"."Quantity"."</th>"."<th>"."Curier Name"."</th>"."<th>"."Curier Surname"."</th>"."<th>"."misamarti"."</th>"."<th>"."Date_dan"."</th>"."<th>"."Date_mde"."</th>"."</tr>";

					//echo $raodenoba1;
						for ($j=0; $j <$raodenoba1 ; $j++) 
						{ 
							$news_array1 = mysql_fetch_array($shes_select);
							$shes_id=$news_array1["shes_id"];
							$cur_id=$news_array1["cur_id"];
							$cur_select=mysql_query("select * from curiers where cur_id='$cur_id'");
							$cur_mass=mysql_fetch_array($cur_select);

						echo "<tr>";
							echo "<td align=\"center\" valign=\"middle\">".$news_array1['dasaxeleba']."</td>";
							//echo "<td align=\"center\" valign=\"middle\">".$article_status."</td>";

							echo "<td align=\"center\" valign=\"middle\">".$news_array1['wag_raodenoba']."</td>";
							echo "<td align=\"center\" valign=\"middle\">".$cur_mass['Name']."</td>";
							echo "<td align=\"center\" valign=\"middle\">".$cur_mass['Surname']."</td>";
							echo "<td align=\"center\" valign=\"middle\">".$news_array1['misamarti']."</td>";
							echo "<td align=\"center\" valign=\"middle\">".$news_array1['date_dan']."</td>";
							echo "<td align=\"center\" valign=\"middle\">".$news_array1['date_mde']."</td>";					
												
								
							echo "</form>";
						echo "</tr>";



						}
					}

					else
					{
						echo "წაღებული არაა არცერთი პროდუქტი";
					}
				
					
			}
			
			echo "</table>";

?>

</body>
</html>