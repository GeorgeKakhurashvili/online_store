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
@$cur_id=$_GET['cur_id'];
$shes_select=mysql_query("select * from shesrulebadi where cur_id='$cur_id'");

echo "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">";
	for($i=0; $i<1; $i++)
		{
					
					

					$raodenoba1=mysql_num_rows($shes_select);
					
					if($raodenoba1>0)
					{
					echo "<tr>"."<th>"."Name"."</th>"."<th>"."Quantity"."</th>"."<th>"."misamarti"."</th>"."<th>"."Date_dan"."</th>"."<th>"."Date_mde"."</th>"."<th>"."Sell"."</th>"."<th>"."Return"."</th>"."</tr>";

					//echo $raodenoba1;
						for ($j=0; $j <$raodenoba1 ; $j++) 
						{ 
							$news_array1 = mysql_fetch_array($shes_select);
							$shes_id=$news_array1["shes_id"];
							$cur_select=mysql_query("select * from curiers where cur_id='$cur_id'");
							$cur_mass=mysql_fetch_array($cur_select);


						echo "<tr>";
							echo "<td align=\"center\" valign=\"middle\">".$news_array1['dasaxeleba']."</td>";
							//echo "<td align=\"center\" valign=\"middle\">".$article_status."</td>";
							echo "<td align=\"center\" valign=\"middle\">".$news_array1['wag_raodenoba']."</td>";
							echo "<td align=\"center\" valign=\"middle\">".$news_array1['misamarti']."</td>";
							echo "<td align=\"center\" valign=\"middle\">".$news_array1['date_dan']."</td>";
							echo "<td align=\"center\" valign=\"middle\">".$news_array1['date_mde']."</td>";	
							echo "<form method='post' action='sell.php?shes_id=$shes_id'>";	
							echo "<input type='hidden' value='$cur_id' name='cur_id' style='background:red;'>";
							echo "<td align=\"center\" valign=\"middle\"  height='70'>"."<input type='submit' value='Sell' class = 'btn btn-primary'>";
							echo "</form>";
							echo "<form method='post' action='return.php?shes_id=$shes_id'>";
							
							echo "<input type='hidden' name='raod' value='$news_array1[wag_raodenoba]'>";
							echo "<input type='hidden' value='$cur_id' name='cur_id' style='background:red;'>";
							echo "<td align=\"center\" valign=\"middle\"  height='70'>"."<input type='submit' value='Return' class = 'btn btn-primary'>";					
								
							echo "</form>";

						echo "</tr>";



						}
					}

					else
					{
						echo "წაღებული არაა არცერთი პროდუქტი";
						echo "<div id='I_am_going'>";
						echo "<form action='I_am_here.php?cur_id=$cur_id' method='post'>";
							echo "<input type='submit' value='I Am Here' class = 'btn btn-primary'>";
						echo "</form>";
						echo "</div>";
						
					}
				
					
			}
			
			echo "</table>";
			echo "<div id='I_am_going'>";
				echo "<form action='I_am_going.php?cur_id=$cur_id' method='post'>";
					echo "<input type='submit' value='I Am Going' class = 'btn btn-primary'>";
				echo "</form>";
			echo "</div>";


?>

</body>
</html>