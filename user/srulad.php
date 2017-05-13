<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script type="text/javascript">
	function saerto_jami () 
	{
		var raod=document.getElementById("all").value;
		var fasi=document.getElementById("fasi").value;
		document.getElementById("jami").innerHTML = raod*fasi+"Gel";
	}
	</script>
</head>
<body>

<?php 
	session_start();
	$conn=mysql_pconnect("localhost","root");
	$dbconn=mysql_select_db("online_store");
	$raodenoba3=1;
  	if (isset($_GET["user_id"])) {
  		$user_id=$_GET["user_id"];
  	}
  	if (isset($_GET["id"])) {
  		$prod_id=$_GET["id"];
  	}

			echo "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">";
				for($i=0; $i<1; $i++)
				{

					
					
					echo "<tr>"."<th>"."dasaxeleba"."</th>"."<th>"."fasi"."</th>"."<th>"."raodenoba"."</th>"."<th>"."misamarti"."</th>"."<th>"."dro_dan"."</th>"."<th>"."dro_mde"."</th>"."<th>"."gasayidi raodenoba"."</th>"."<th>"."saerto safasuri"."</th>"."<th>"."Buy"."</th>"."</tr>";

					//echo $raodenoba1;
					for ($j=0; $j <1 ; $j++) 
					{ 
						$select=mysql_query("select * from sell_products_all where prod_id='$prod_id'");
						$news_array = mysql_fetch_array($select);
						$id = $news_array["prod_id"];
						//echo $news_array1['sawy_id'];
						//echo $id;
						echo "<tr>";
						
						//echo "<td align=\"center\" valign=\"middle\">".$news_array['']."</td>";


						echo "<td align=\"center\" valign=\"middle\">".$news_array['dasaxeleba']."</td>";
						//echo "<td align=\"center\" valign=\"middle\">".$article_status."</td>";
						echo "<td align=\"center\" valign=\"middle\">".$news_array['fasi']." Gel"."</td>";
						echo "<td align=\"center\" valign=\"middle\" style='font-size:16pt;'>".$news_array["raodenoba"]."</td>";
						echo "<form method='post' action='buy_action.php?ID=$id&user_id=$user_id'>";
							echo "<td align=\"center\" valign=\"middle\">"."<input type='text' name='misamarti' class = 'form-control'>"."</td>";
							echo "<td align=\"center\" valign=\"middle\">"."<input type='datetime-local' name='Date_dan' class = 'form-control'>"."</td>";
							echo "<td align=\"center\" valign=\"middle\">"."<input type='datetime-local' name='Date_mde' class = 'form-control'>"."</td>";
							echo "<td align=\"center\" valign=\"middle\">"."<input type='text' name='raodenoba' autofocus value='$raodenoba3' id='all' class = 'form-control'  onkeyup ='saerto_jami();'>"."</td>";

							echo "<input type='hidden' name='fasi' value='$news_array[fasi]' class = 'form-control' id='fasi'>";
							
							echo "<td align=\"center\" valign=\"middle\" id='jami'>".$raodenoba3*$news_array['fasi']." Gel"."</td>";
							echo "<td align=\"center\" valign=\"middle\"  height='70'>"."<input type='submit' value='Buy' class = 'btn btn-primary'>";				
						echo "</form>";
						
					echo "</tr>";


					
				}
				
			
				
					
			}
			
			echo "</table>";

			?>
</body>
</html>