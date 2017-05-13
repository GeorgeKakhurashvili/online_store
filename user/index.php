<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <head>
        <meta charset="UTF-8" /> 
        <title></title>
        <link rel="icon" href="photo/logo1-2.png"> 
        <link rel="stylesheet" type="text/css" href="style/demo.css" />
        <link rel="stylesheet" type="text/css" href="style_user.css" />
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
		<script type="text/javascript" src="script/jquery.js"></script>
        <script type="text/javascript" src="script/myScript.js"></script>
        
    </head>
        <body>
            <div id="homepage">
                <header>
                    <nav>
                       <ul>
                        <?php 
                            error_reporting(0);
                            $conn=mysql_pconnect("localhost","root");
                            $dbconn=mysql_select_db("online_store"); 
                            $select_saw=mysql_query("select * from sawyobi");
                            $saw_raod=mysql_num_rows($select_saw);
                            if(isset($_GET["check"]))$check= $_GET["check"];
                            if(isset($_GET["user_id"]))$user_id= $_GET["user_id"];
                            echo "<center>";
                            echo "<li><a href='index.php?check=$check&user_id=$user_id'>Main</a></li>";
                            for ($i=0; $i < $saw_raod; $i++) 
                            { 
                                $saw_mass=mysql_fetch_array($select_saw);
                                $kat_id=$saw_mass["id"];

                                echo "<li><a href='index.php?id=$kat_id&check=$check&user_id=$user_id'>$saw_mass[dasaxeleba]</a></li>";
                                
                            }
                            echo "</center>";
                           
                        ?>

                       </ul> 
                    </nav>

                    <center >
                        <div id='full'>
                        <?php
                            if(isset($_GET["check"]))$check= $_GET["check"];
                            if(isset($_GET["user_id"]))$user_id= $_GET["user_id"];
                            $conn=mysql_pconnect("localhost","root");
                            $dbconn=mysql_select_db("online_store");
                            $user_select=mysql_query("select * from users where record_id=$user_id");
                            $user_mass=mysql_fetch_array($user_select);
                            if($check==1)
                            {

                                echo "<div class ='contact_action'>";
                                echo "<a href='user_page.php?user_id=$user_id' target='_blank' class = 'btn btn-primary' style='width:100%; height:100%;'><h3 style='margin-top:0.05vh;'>$user_mass[Login]</h3></a>";
                                echo "</div>";
                                echo "<div class ='contact_action'>";
                                echo "<a href = 'log_out.php' class = 'btn btn-primary' style='width:100%; height:100%;'><h3 style='margin-top:0.05vh;'>Log Out</h3></a>";
                                echo "</div>";

                            
                            }
                            else
                            {
                                echo "<div class ='contact_action'>";
                                echo "<a href = 'form.php' target='_blank' class = 'btn btn-primary' style='width:100%; height:100%;'><h3 style='margin-top:0.05vh;'>Registration</h3></a>";
                            echo "</div>";
                            
                            echo "<div class ='contact_action'>
                                <a href = 'login.php' class = 'btn btn-primary' style='width:100%; height:100%;'><h3 style='margin-top:0.05vh;'>Sign In</h3></a>";
                            echo "</div>";
                            }
                        ?>
                        </div>
                    </center>  
                    
                </header> 
                <div id="content">
                    <?php 
                        if(isset($_GET["check"]))$check= $_GET["check"];
                        if(isset($_GET["id"]))
                        {
                            $id=$_GET["id"];
                            
                            $conn=mysql_pconnect("localhost","root");
                            $dbconn=mysql_select_db("online_store"); 
                            $select_kat=mysql_query("select * from qvekategoriebi where sawy_id=$id");
                            $kat_raod=mysql_num_rows($select_kat);
                           
                            for ($i=0; $i < $kat_raod; $i++) 
                            { 
                                $kat_mass=mysql_fetch_array($select_kat); 
                                $ID=$kat_mass["ID"];

                                echo "<div id='in_content'>";
                                
                                    echo "<center>"; 
                                    echo "<img src='$kat_mass[img_link]' height='100%' width='100%'>";
                                        echo "<p class='agwera'>$kat_mass[qve_dasaxeleba]</p>";
                                        echo "<h2>Cost : $kat_mass[fasi]</h2>";
                                        echo "<a href = 'add_to_basket.php?id=$ID&check=$check&user_id=$user_id' class = 'btn btn-primary' style='width:15vh;'>Add To Cart</a>";
                                        
                                    echo "</center>";
                                echo "</div>";
                            } 
                        }
                        else
                        {
                            $select_kat=mysql_query("select * from qvekategoriebi");
                            $kat_raod=mysql_num_rows($select_kat);
                           
                            for ($i=0; $i < $kat_raod; $i++) 
                            { 
                                $kat_mass=mysql_fetch_array($select_kat); 
                                $ID=$kat_mass["ID"];
                                echo "<div id='in_content'>";
                                    echo "<center>";

                                    echo "<img src='$kat_mass[img_link]' height='100%' width='100%'>";
                                        echo "<p class='agwera'>$kat_mass[qve_dasaxeleba]</p>";
                                        echo "<h2>Cost : $kat_mass[fasi]</h2>";
                                        echo "<a href = 'add_to_basket.php?id=$ID&check=$check&user_id=$user_id' class = 'btn btn-primary' style=' width:15vh;'>Add To Cart</a>";
                                        
                                    echo "</center>";
                                echo "</div>";
                            } 
                            echo "<div class='alert'>";
                                        if(isset($_GET["alert_pro"])){$msg_pro=$_GET["alert_pro"]; echo $msg_pro;}
                                        echo "</div>";
                        }

                    ?>
                </div><!--end of content-->
                <footer>
                    <center>
                        <h4 class="copy">Copyright &copy All Rights Reserved</h4>

                    </center>  

                </footer>
            </div><!--end of homepage-->  





        </body>
    </html>