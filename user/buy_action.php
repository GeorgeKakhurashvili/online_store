<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style_user.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<?php  
$conn=mysql_pconnect("localhost","root");
$dbconn=mysql_select_db("online_store");
$ID=$_GET["ID"];
echo $ID;
if(isset($_POST["misamarti"])){$misamarti=$_POST["misamarti"];}
if(isset($_POST["raodenoba"])){$raodenoba=$_POST["raodenoba"];}
if(isset($_POST["Date_dan"])){ $Date_dan=$_POST["Date_dan"];}
if(isset($_POST["Date_mde"])){ $Date_mde=$_POST["Date_mde"];}
$sel_qve=mysql_query("select * from sell_products_all where prod_id='$ID'");
$mass_qve=mysql_fetch_array($sel_qve);
$qve_dasaxeleba=$mass_qve["dasaxeleba"];
if (isset($_GET["user_id"])) {
  		$user_id=$_GET["user_id"];
  	}
  	
$prod_insert=mysql_query("insert into sell_products (user_id,dasaxeleba,misamarti,date_dan,date_mde,raodenoba) values('$user_id','$qve_dasaxeleba', '$misamarti', '$Date_dan','$Date_dan', '$raodenoba')");
if($prod_insert)
{
	$prod_delete=mysql_query("delete from sell_products_all where prod_id='$ID'");
	echo "<div id='payment_place'>";
		echo "<div id='buton'>";
				echo "<a href='#' class = 'btn btn-primary'>Add Card And Buy</a>";
		echo "</div>";
	echo "</div>";
	
}
//?user_id=$user_id&id=$prod_id
	

?>