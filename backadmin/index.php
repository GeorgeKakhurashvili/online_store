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
	//if(isset($_GET["msg"])){ $msg=$_GET["msg"];}
	echo "<div id='main1'>";
		echo "<div id='main'>";

			

			//echo "<br />"."<br />";

			echo "<div id='form1'>";
				if(isset($_GET["shetyobineba"])){ $msg=$_GET["shetyobineba"]; echo $msg;}
				if(isset($_GET["shetyobineba1"])){ $msg1=$_GET["shetyobineba1"]; echo $msg1;}
				echo "<br />";
				echo "<strong id='title'>"."დაამატეთ პროდუქციის დასახელება"."</strong>";
				echo "<form action='index_action.php'  method='post' class = 'form-group' >";
					echo "<input type='text' name='Dasaxeleba' class = 'form-control' placeholder='დასახელება'>"."<br />";
					echo "<input type='submit' value='Add' class = 'btn btn-primary'>";
				echo "</form>";//end of form of produqciis dasaxeleba
			echo "</div>";

			$select=mysql_query("select * from sawyobi");
			$raodenoba=mysql_num_rows($select);
			
			for ($i=0; $i <$raodenoba ; $i++) 
				{ 
					$personebis_masivi=mysql_fetch_array($select);
					
					echo "<div id='form3'>";
						echo "<div id='form2'>";
							echo "<h3 id = 'description1'>"."<strong>"."ქვეკატეგორია:"."</strong>".$personebis_masivi['dasaxeleba']."</h3>";
						echo "</div>";
						echo "<form action='qvekategoria_action.php'  method='post' class = 'form-group' enctype='multipart/form-data'>";
							
							echo "<input type='text' name='Qvekategoria' class = 'form-control' placeholder='ქვედასახელება'>"."<br />";
							//echo "<input type='checkbox' name='Status' class = 'form-control' placeholder='Status'>"."<br />";
							echo "<input type='text' name='Fasi' class = 'form-control' placeholder='ფასი'>"."<br/>";
							echo "<input type='text' name='Raodenoba' class = 'form-control' placeholder='რაოდენობა'>"."<br />";
							echo "<input type='file' name='photo' class = 'form-control' placeholder='სურათი'>"."<br />";
							echo "<input type='submit' value='Add' class = 'btn btn-primary'>";
							echo "<input type='hidden' name='record_id' value=\"$personebis_masivi[0]\">";
						echo "</form>";//end of form
					echo "</div>";
				}
		echo "</div>";

		echo "<div id='table'>";
			$select=mysql_query("select * from sawyobi");
			$raodenoba=mysql_num_rows($select);
			
			echo "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">";
				for($i=0; $i<$raodenoba; $i++)
				{
					$news_array = mysql_fetch_array($select);
					
					$s_id=$news_array['id'];
					
					
					
					//echo $s_id;
					
					$select1=mysql_query("select * from qvekategoriebi where sawy_id='$s_id'");

					$raodenoba1=mysql_num_rows($select1);
					if($raodenoba1>0)
					{
					echo "<tr>"."<th>".$news_array['dasaxeleba']."</th>"."<th>"."fasi"."</th>"."<th>"."raodenoba"."</th>"."<th>"."saerto safasuri"."</th>"."<th>"."image"."</th>"."<th>"."Update"."<th>"."Delete"."</tr>";

					//echo $raodenoba1;
					for ($j=0; $j <$raodenoba1 ; $j++) 
					{ 
						$news_array1 = mysql_fetch_array($select1);
						$id = $news_array1["ID"];
						//echo $news_array1['sawy_id'];
						//echo $id;
						echo "<tr>";
						
						//echo "<td align=\"center\" valign=\"middle\">".$news_array['']."</td>";


						echo "<td align=\"center\" valign=\"middle\">".$news_array1['qve_dasaxeleba']."</td>";
						//echo "<td align=\"center\" valign=\"middle\">".$article_status."</td>";
						echo "<td align=\"center\" valign=\"middle\">".$news_array1['fasi']."</td>";
						echo "<td align=\"center\" valign=\"middle\">".$news_array1['raodenoba']."</td>";
						echo "<td align=\"center\" valign=\"middle\">".$news_array1['raodenoba']*$news_array1['fasi']."</td>";
						echo "<td align=\"center\" valign=\"middle\">"."<img src='$news_array1[img_link]'>"."</td>";
						echo "<form method='post' action='updating.php'>";
							echo "<td align=\"center\" valign=\"middle\"  height='70'>"."<a href = \"updating.php?ID=$id\" class = \"btn btn-info\">Update </a>";
							
						echo "</form>";
						echo "<form method='post' action delete.php>";
							echo "<td align=\"center\" valign=\"middle\"  height='70'>"."<a href = \"delete.php?ID=$id\" class = \"btn btn-danger\" >Delete </a>";				
						echo "</form>";

					echo "</tr>";


					}
				}


						/*
					}*/
			}
			
			echo "</table>";

		echo "</div>";
	echo "</div>";

?>
</body>
</html>