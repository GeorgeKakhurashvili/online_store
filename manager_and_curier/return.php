<?php
$conn=mysql_pconnect("localhost","root");
$dbconn=mysql_select_db("online_store");
if(isset($_POST["raod"])){$raod=$_POST["raod"];}
$shes_id=$_GET["shes_id"];
if(isset($_POST["cur_id"])){$cur_id=$_POST["cur_id"];}
$select=mysql_query("select * from shesrulebadi where shes_id='$shes_id'");
$mass=mysql_fetch_array($select);
$qve_id=$mass["qve_id"];
$qve_select=mysql_query("select * from qvekategoriebi where ID='$qve_id'");
$qve_mass=mysql_fetch_array($qve_select);
$qve_raodenoba=$qve_mass["raodenoba"];
$sruli_raodenoba=$qve_raodenoba+$raod;
$update=mysql_query("update qvekategoriebi set raodenoba='$sruli_raodenoba' where ID='$qve_id'");
$delete=mysql_query("delete from shesrulebadi where shes_id='$shes_id'");
if($update && $delete)
{
	$msg="ukan dabrunda produqti";
}
header("location:finish.php?cur_id=$cur_id&alert=$msg");
?>