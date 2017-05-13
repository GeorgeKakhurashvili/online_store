<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <head>
        <meta charset="UTF-8" /> 
        <title></title>
        <link rel="icon" href="photo/logo1-2.png"> 
        <link rel="stylesheet" type="text/css" href="style_user.css" />
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        
    </head>
<?php
    if(isset($_GET["user_id"]))$user_id= $_GET["user_id"];
    if(isset($_GET["check"]))$check= $_GET["check"];
    if(isset($_GET["click_check"]))@$click_check= $_GET["click_check"];
    $conn=mysql_pconnect("localhost","root");
    $dbconn=mysql_select_db("online_store");
    $prod_sel=mysql_query("select * from sell_products_all where user_id='$user_id'");
    $prod_raod=mysql_num_rows($prod_sel);
    $user_select=mysql_query("select * from users where record_id=$user_id");
    $user_mass=mysql_fetch_array($user_select);
    
        if(@$click_check==1)
        {
            if(isset($_GET["alert_pro"]))$alert_pro= $_GET["alert_pro"];
           header("Location:index.php?check=$check&user_id=$user_id&alert_pro=$alert_pro"); 
        }
        else
        {
        echo "<div id='user_full'>";
    	echo "<div id='image'>";
    	 	echo "<img src='$user_mass[img_link]' width='100%' height='100%'>";
    	 echo "</div>";
    	 echo "<div id='info'>";
    	 	echo "<ul class='info'>";
    	 		echo "<li>"."Name  :  ".$user_mass['Name']."</li>";
    	 		echo "<li>"."Surname  :  ".$user_mass['Surname']."</li>";
    	 		echo "<li>"."Username  :  ".$user_mass['Login']."</li>";
    	 		echo "<li>"."Email  :  ".$user_mass['Email']."</li>";
    	 		echo "<li>"."Gender  :  ".$user_mass['Gender']."</li>";
    	 		echo "<li>"."Phonenumber  :  ".$user_mass['Phonenumber']."</li>";
    	 		echo "<li>"."PersonalID  :  ".$user_mass['Personalid']."</li>";
    	 		echo "<li>"."Birthdate  :  ".$user_mass['Birthdate']."</li>";
    	 		echo "<li>"."RegistrationDate  :  ".$user_mass['Registrationdate']."</li>";
    	 	echo "</ul>";
    	 echo "</div>";
    	 echo "<div class='butt'>";
    	 	echo "<a href = 'info_update.php?user_id=$user_id' target='_blank' class = 'btn btn-primary' style='width:100%; height:100%;'><h4 style='float:left; margin-top:3px; margin-left:-2px;'>Update You Personal Info</h4></a>";
    	 echo "</div>";
    	 echo "<div class='butt'>";
    	 	echo "<a href = 'update_password.php?user_id=$user_id' target='_blank' class = 'btn btn-primary' style='width:90%; height:100%;'><h4 style='float:left; margin-top:3px; margin-left:-2px;'>Update You Password</h4></a>";
    	 echo "</div>";
         echo "<div id='kalata'>";
         echo "<table width=\"106.6%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" style='color:white;'>";
                for ($i=0; $i < $prod_raod; $i++) 
                { 
                $prod_mass=mysql_fetch_array($prod_sel);
                $prod_id=$prod_mass["prod_id"];
                echo "<tr style='font-size:14pt; color:white;'>"."<th>"."dasaxeleba"."</th>"."<th>"."fasi"."</th>"."<th>"."raodenoba"."</th>"."<th>"."Buy"."</th>"."<th>"."Delete from basket"."</th>"."</tr>";
                echo "<td align=\"center\" valign=\"middle\" style='font-size:16pt;'>".$prod_mass['dasaxeleba']."</td>";
                echo "<td align=\"center\" valign=\"middle\" style='font-size:16pt;'>".$prod_mass["fasi"]."</td>";
                echo "<td align=\"center\" valign=\"middle\" style='font-size:16pt;'>".$prod_mass["raodenoba"]."</td>";
                if($prod_mass["raodenoba"]>0)
                {
                echo "<td align=\"center\" valign=\"middle\" style='font-size:16pt;'>"."<a href='srulad.php?user_id=$user_id&id=$prod_id' target='_blank' class = 'btn btn-primary'>Buy</a>"."</td>";
                }
                else
                {
                   echo "<td align=\"center\" valign=\"middle\" style='font-size:16pt;'>"."<h4>ამოწურულია</h4>"."</td>"; 
                }
                echo "<td align=\"center\" valign=\"middle\" style='font-size:16pt;'>"."<a href='delete_prod.php?id=$prod_id&user_id=$user_id' class = 'btn btn-primary'>Delete</a>"."</td>";
                
                }
            echo "</table>";
         echo "</div>";
    echo "</div>";
}
   
?>

