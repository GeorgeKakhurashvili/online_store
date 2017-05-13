<?php
$conn=mysql_pconnect("localhost","root");
$dbconn=mysql_select_db("online_store");
$shes_id=$_GET["shes_id"];
if(isset($_POST["cur_id"])){$cur_id=$_POST["cur_id"];}
$delete=mysql_query("delete from shesrulebadi where shes_id='$shes_id'");
if($delete)
{
	$msg="gaiyida produqti";
}
header("location:finish.php?cur_id=$cur_id&alert=$msg");
?>