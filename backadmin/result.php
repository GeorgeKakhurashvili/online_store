<?php
			if(isset($_POST["raodenoba"])){ $raodenoba=$_POST["raodenoba"]; }
			$conn=mysql_pconnect("localhost","root");
			$dbconn=mysql_select_db("online_store");
			$id = $_GET['ID'];
			$sel=mysql_query("select * from qvekategoriebi where ID=$id");
			$raod=mysql_num_rows($sel);
			for ($i=0; $i < $raod; $i++) 
			{ 
				$mas=mysql_fetch_array($sel);
				$sruliraod=$mas['raodenoba'];
			}
			if($raodenoba<=$sruliraod)
			{
			$sruliraodenoba=$sruliraod-$raodenoba;
			
			
			$update=mysql_query("update qvekategoriebi set raodenoba='$sruliraodenoba' where ID='$id'");
			$msg="gaiyida ".$raodenoba." produqti";
			header("location:search.php?shetyobineba=$msg");
			}
			else
			{
				$msg="bazashi amdeni produqti ar arsebobs";
				header("location:search.php?shetyobineba=$msg");
			}

?>