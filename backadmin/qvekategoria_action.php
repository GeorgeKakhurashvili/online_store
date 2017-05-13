<?php
$conn=mysql_pconnect("localhost","root");
$dbconn=mysql_select_db("online_store");
if(isset($_POST["Qvekategoria"])){ $Qvekategoria=$_POST["Qvekategoria"]; }
if(isset($_POST["record_id"])){$record_id=$_POST["record_id"];}
if(isset($_POST["Status"])){$Status=$_POST["Status"];}
if(isset($_POST["Fasi"])){$Fasi=$_POST["Fasi"];}
if(isset($_POST["Raodenoba"])){$Raodenoba=$_POST["Raodenoba"];}
$select=mysql_query("select * from qvekategoriebi where qve_dasaxeleba='$Qvekategoria'");
$raod=mysql_num_rows($select);
$mass=mysql_fetch_array($select);
$dzveli_raod=$mass["raodenoba"];
$mteli_raod=$Raodenoba+$dzveli_raod;
$max_height = 200;
$max_width = 200;
if(isset($_FILES['photo']))
 {
   $photo=$_FILES['photo'];
   $file_type=$_FILES['photo']['type'];
   $file_name=$_FILES['photo']['name'];
   $file_temp_name=$_FILES['photo']['tmp_name'];
   $file_size=$_FILES['photo']['size'];
   if($file_type=="image/jpeg")
    {
    $new_file_name="../images/products/f_".time("U").".jpg";
    $new_img_name="f_".time("U").".jpg";
    $upl_img=move_uploaded_file($file_temp_name, $new_file_name);
    list($width,$height)=getimagesize($new_file_name);
    if ($width > $height) {
      $newheigh = $height/($width/$max_width);
      $newwidth = $max_width;
    }
    else
    {
      $newwidth = $width/($height/$max_height);
      $newheigh = $max_height;
    }

    $smallimage=imagecreatetruecolor($newwidth, $newheigh);
    
    $img_source=imagecreatefromjpeg($new_file_name);

    $resized_img=imagecopyresampled($smallimage, $img_source, 0, 0, 0, 0, $newwidth, $newheigh, $width, $height);
    imagejpeg($smallimage,$new_file_name);
    
	}
}
if($Qvekategoria=='')
{
	$msg="ქვეკატეგორიაში არ დაემატა";
	header("Location:index.php?shetyobineba1=$msg");

}
else if($raod>0)
{
  $update=mysql_query("update qvekategoriebi set fasi='$Fasi', raodenoba='$mteli_raod'");
  $msg="ქვეკატეგორიაში წარმატებით დაემატა";
  header("Location:index.php?shetyobineba1=$msg");
}
else
{
//echo "<script type='text/javascript'>alert('registracia warmatebit dasrulda');</script>";

	
	

$ins=mysql_query("insert into qvekategoriebi(sawy_id,qve_dasaxeleba, fasi,raodenoba, statusi, img_link) values('$record_id', 
	'$Qvekategoria','$Fasi','$Raodenoba','$Status','$new_file_name')");
$msg="ქვეკატეგორიაში წარმატებით დაემატა";
	header("Location:index.php?shetyobineba1=$msg");
//$upd=mysql_query("update registration_form Name='$saxeli' where chanaweris_id='1'");

}

?>