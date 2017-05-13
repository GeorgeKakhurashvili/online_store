<?php
$conn=mysql_pconnect("localhost","root");
$dbconn=mysql_select_db("online_store");
$prod_select=mysql_query("select * from sell_products");
$raod_prod=mysql_num_rows($prod_select);
echo "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">";
for ($i=0; $i < $raod_prod; $i++) 
{
$k=$i+1; 
echo "<tr style='font-size:14pt;'>"."<th>".$k." : "."dasaxeleba"."</th>"."<th>"."misamarti"."</th>"."<th>"."dro_dan"."</th>"."<th>"."dro_mde"."</th>"."<th>"."raodenoba"."</th>"."</tr>";

	
$mass_prod=mysql_fetch_array($prod_select);
echo "<td align=\"center\" valign=\"middle\" style='font-size:16pt;'>".$mass_prod['dasaxeleba']."</td>";
echo "<td align=\"center\" valign=\"middle\" style='font-size:16pt;'>".$mass_prod['misamarti']."</td>";
echo "<td align=\"center\" valign=\"middle\" style='font-size:16pt;'>".$mass_prod['date_dan']."</td>";
echo "<td align=\"center\" valign=\"middle\" style='font-size:16pt;'>".$mass_prod['date_mde']."</td>";
echo "<td align=\"center\" valign=\"middle\" style='font-size:16pt;'>".$mass_prod['raodenoba']."</td>";
}
echo "</table>";
?>