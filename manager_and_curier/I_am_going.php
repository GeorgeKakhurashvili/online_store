<?php  
$conn=mysql_pconnect("localhost","root");
$dbconn=mysql_select_db("online_store");
$cur_id=$_GET["cur_id"];
$update_cur=mysql_query("update curiers set Status=1 where cur_id='$cur_id'");
if($update_cur)

{
	$msg="tqven gaxvedit qselshi";
}
header("Location:../index.php?alert=$msg");
?>