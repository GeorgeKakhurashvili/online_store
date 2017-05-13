<?php
$conn=mysql_pconnect("localhost","root");
$dbconn=mysql_select_db("online_store");
if(isset($_POST["Dasaxeleba"])){ $Dasaxeleba=$_POST["Dasaxeleba"]; }
if($Dasaxeleba=='')
{
	$msg="არ დაემატა";
	header("Location:index.php?shetyobineba=$msg");

}
else
{
//echo "<script type='text/javascript'>alert('registracia warmatebit dasrulda');</script>";
$ins=mysql_query("insert into sawyobi(dasaxeleba) values('$Dasaxeleba')");
	$msg="წარმატებით დაემატა";
	header("Location:index.php?shetyobineba=$msg");
//$upd=mysql_query("update registration_form Name='$saxeli' where chanaweris_id='1'");
}

?>