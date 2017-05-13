<?php
if(isset($_GET["id"]))$id=$_GET["id"];
if(isset($_GET["user_id"]))$user_id= $_GET["user_id"];
$conn=mysql_pconnect("localhost","root");
$dbconn=mysql_select_db("online_store");
$prod_delete=mysql_query("delete from sell_products_all where prod_id='$id'");
if($prod_delete)
{
	header("Location:user_page.php?user_id=$user_id");
}
?>