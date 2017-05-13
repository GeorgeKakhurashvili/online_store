<?php 
	session_start();
	$conn=mysql_pconnect("localhost","root");
	$dbconn=mysql_select_db("online_store");
	$id=$_GET["id"];
	$select=mysql_query("select * from qvekategoriebi where ID='$id'");
	$raodenoba1=mysql_num_rows($select);
	$raodenoba3=1;
	$check=$_GET["check"];
  	$personebis_masivi=mysql_fetch_array($select);
  	if (isset($_GET["user_id"])) 
  	{
  		$user_id=$_GET["user_id"];
  	}

			
				for($i=0; $i<1; $i++)
				{

					
					if($raodenoba1>0 && $check==1)
					{
					
					for ($j=0; $j <1 ; $j++) 
						{ 
							$select=mysql_query("select * from qvekategoriebi where ID='$id'");
							$news_array = mysql_fetch_array($select);
							$id = $news_array["ID"];
							$prod_dasaxeleba=$news_array["qve_dasaxeleba"];
							$prod_fasi=$news_array["fasi"];
							$prod_raodenoba=$news_array["raodenoba"];
							//echo $news_array1['sawy_id'];
							//echo $id;
							$insert_prod=mysql_query("insert into sell_products_all (user_id,dasaxeleba,fasi,raodenoba) values('$user_id','$prod_dasaxeleba','$prod_fasi','$prod_raodenoba')");
							if($insert_prod)
							{
								$click_check=1;
								$msg_pro="დაემატა თქვენს კალათას";
								header("Location:user_page.php?check=$check&user_id=$user_id&alert_pro=$msg_pro&click_check=$click_check&id=$id");
							}

						}
					}
				
				else
				{
					$msg="გაიარე ავტორიზაცია ან დარეგისტრირდი";
					header("Location:login.php?alert=$msg");
				}
				
					
			}
			
			

			?>