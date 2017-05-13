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
			session_start();
            $conn=mysql_pconnect("localhost","root");
            $dbconn=mysql_select_db("online_store");

            echo "<div id='table'>";
            if(isset($_GET["alert"])) {$msg = $_GET["alert"]; echo $msg;}
			$select=mysql_query("select * from admin");
			$raodenoba=mysql_num_rows($select);
			
			echo "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">";
				for($i=0; $i<$raodenoba; $i++)
				{
					$news_array = mysql_fetch_array($select);
					
					$s_id=$news_array['record_id'];
					
					
					
					//echo $s_id;
					
					$select1=mysql_query("select * from admin where record_id='$s_id'");

					$raodenoba1=mysql_num_rows($select1);
					if($raodenoba1>0)
					{
					echo "<tr>"."<th>"."Name"."</th>"."<th>"."Surname"."</th>"."<th>"."Email"."</th>"."<th>"."Gender"."</th>"."<th>"."Personal_id"."</th>"."<th>"."Phonenumber"."</th>"."<th>"."Birthdate"."</th>"."<th>"."Registrationdate"."</th>"."<th>"."Permision"."</th>"."<th>"."Update"."</th>"."<th>"."Delete"."</tr>";

					//echo $raodenoba1;
					for ($j=0; $j <$raodenoba1 ; $j++) 
					{ 
						$news_array1 = mysql_fetch_array($select1);
						$id = $news_array1["record_id"];
						$per_value=$news_array1["Permision"];
						$sel=mysql_query("select * from permisions where per_id='$per_value'");
						$per_raod=mysql_num_rows($sel);
						for($k=0; $k<$per_raod; $k++)
						{
							$mass=mysql_fetch_array($sel);
						}
						//echo $news_array1['sawy_id'];
						//echo $id;
						echo "<tr>";
						
						//echo "<td align=\"center\" valign=\"middle\">".$news_array['']."</td>";


						echo "<td align=\"center\" valign=\"middle\">".$news_array1['Name']."</td>";
						//echo "<td align=\"center\" valign=\"middle\">".$article_status."</td>";
						echo "<td align=\"center\" valign=\"middle\">".$news_array1['Surname']."</td>";
						echo "<td align=\"center\" valign=\"middle\">".$news_array1['Email']."</td>";
						echo "<td align=\"center\" valign=\"middle\">".$news_array1['Gender']."</td>";
						echo "<td align=\"center\" valign=\"middle\">".$news_array1['Personalid']."</td>";
						echo "<td align=\"center\" valign=\"middle\">".$news_array1['Phonenumber']."</td>";
						echo "<td align=\"center\" valign=\"middle\">".$news_array1['Birthdate']."</td>";
						echo "<td align=\"center\" valign=\"middle\">".$news_array1['Registrationdate']."</td>";
						echo "<td align=\"center\" valign=\"middle\">".$mass['Permision']."</td>";
						echo "<form method='post' action='updating.php'>";
							echo "<td align=\"center\" valign=\"middle\"  height='70'>"."<a href = \"updating.php?record_id=$id\" class = \"btn btn-info\">Update </a>";
							
						echo "</form>";
						echo "<form method='post' action delete.php>";
							echo "<td align=\"center\" valign=\"middle\"  height='70'>"."<a href = \"delete.php?record_id=$id\" class = \"btn btn-danger\" id='dismiss'>Dissmis</a>";				
						echo "</form>";

					echo "</tr>";


					}
				}


						/*
					}*/
			}
			
			echo "</table>";
			if(isset($_GET["alert1"])==1){echo "<script>"."documnet.getElementById('dismiss').disabled = 'disabled';"."</script>";}


		echo "</div>";
?>