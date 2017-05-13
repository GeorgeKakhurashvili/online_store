<?php
			if(isset($_POST["raodenoba"])){ $raodenoba=$_POST["raodenoba"]; }
			if(isset($_POST["Curiers"])){ $Curiers=$_POST["Curiers"];}
			if(isset($_POST["misamarti"])){ $misamarti=$_POST["misamarti"];}
			if(isset($_POST["Date_dan"])){ $Date_dan=$_POST["Date_dan"];}
			if(isset($_POST["Date_mde"])){ $Date_mde=$_POST["Date_mde"];}
			$conn=mysql_pconnect("localhost","root");
			$dbconn=mysql_select_db("online_store");
			$id = $_GET['ID'];
			$sel=mysql_query("select * from qvekategoriebi where ID=$id");
			$raod=mysql_num_rows($sel);
			$date=date("Y-m-d h:i:sa");
			for ($i=0; $i < $raod; $i++) 
			{ 
				$mas=mysql_fetch_array($sel);
				$sruliraod=$mas['raodenoba'];
			}
			$dasaxeleba=$mas['qve_dasaxeleba'];
			
			if($raodenoba<=$sruliraod)
			{
			$sruliraodenoba=$sruliraod-$raodenoba;
			$insert=mysql_query("insert into shesrulebadi (qve_id, cur_id, dasaxeleba, wag_raodenoba, misamarti, date_dan, date_mde) values('$id', '$Curiers' ,'$dasaxeleba', '$raodenoba','$misamarti', '$Date_dan', '$Date_mde')");
			$update=mysql_query("update qvekategoriebi set raodenoba='$sruliraodenoba' where ID='$id'");
			$update_cur=mysql_query("update curiers set date_dan='$Date_dan', date_mde='$Date_mde' where cur_id='$Curiers'");
			$msg="gaiyida ".$raodenoba." produqti";

			header("location:search.php?shetyobineba=$msg");
			}
			else
			{
				$msg="bazashi amdeni produqti ar arsebobs";
				header("location:search.php?shetyobineba=$msg");
			}

?>