<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <head>
        <meta charset="UTF-8" /> 
        <title></title>
        <link rel="icon" href="photo/logo1-2.png"> 
        <link rel="stylesheet" type="text/css" href="style/demo.css" />
        <link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<script type="text/javascript" src="script/jquery.js"></script>
        <script type="text/javascript" src="script/myScript.js"></script>
        
    </head>
     <style type="text/css">
    ul li a:hover
    {
        color:black;
        text-decoration: none;  
         
    }
    .container1
    {
        width: 100%;
    }
    .contact_action
    {
        width: 40vh;
        height: 5vh;
        float: left;
        margin-left: 10vh;
    }
    #full
    {
       
        float: left;
        margin-left: 40vh;
        margin-top: 40vh;
    }
    </style>
    <body id="page">
    <div class="container1" id="cont">
        <?php 
            
            $conn=mysql_pconnect("localhost","root");
            $dbconn=mysql_select_db("online_store");
            if(isset($_POST["Login"])){ $Login=$_POST["Login"]; }
            if(isset($_POST["Password"])){ $Password=$_POST["Password"];}
            $select=mysql_query("select * from admin where Login='$Login' and Password='$Password'");
            $raodenoba=mysql_num_rows($select);
            $mass=mysql_fetch_array($select);
            $per_id=$mass['Permision'];
            $per_sel=mysql_query("select * from permisions where per_id='$per_id'");
            $per_raod=mysql_num_rows($per_sel);
            for ($i=0; $i <$per_raod; $i++) 
            { 
                $per_mass=mysql_fetch_array($per_sel);
                
            }
            
                
            
            
            if($raodenoba>0 && $per_mass["Permision"]=="MainAdmin")
                {
                    echo "<center>";
                    echo "<div id='full'>";
                        echo "<div class ='contact_action'>";
                            echo "<a href = 'form.php' target='_blank' class = 'btn btn-primary' style='width:100%; height:100%;'><h3 style='margin-top:0.05vh;'>Stuff Registration</h3></a>";
                        echo "</div>";
                        echo "<div class ='contact_action'>";
                            echo "<a href = 'stuff_control.php' target='_blank' class = 'btn btn-primary' style='width:100%; height:100%;'><h3 style='margin-top:0.05vh;'>Stuff Control</h3></a>";
                        echo "</div>";
                       
                    
                    echo "</div>";
                    echo "</center>";
                }
            else if($raodenoba>0 && $per_mass["Permision"]=="BackAdmin")
            {
                echo "<center>";
                    echo "<div class='backadmin'>";
                        echo "<div class ='back_action'>";
                            echo "<a href = 'backadmin/index.php' target='_blank' class = 'btn btn-primary' style='width:100%; height:100%;'><h3 style='margin-top:0.05vh;'>Add Products</h3></a>";
                        echo "</div>";
                    echo "</div>";
                echo "</center>";
            }
            else if($raodenoba>0 && $per_mass["Permision"]=="Manager")
            {
                echo "<center>";
                    echo "<div class='backadmin' style='width:100vh;'>";
                        echo "<div class ='back_action'>";
                            echo "<a href = 'manager_and_curier/buy.php' target='_blank' class = 'btn btn-primary' style='width:100%; height:100%;'><h3 style='margin-top:0.05vh;'>Sell Products</h3></a>";
                        echo "</div>";
                        echo "<div class ='back_action'>";
                            echo "<a href = 'manager_and_curier/check_user.php' target='_blank' class = 'btn btn-primary' style='width:100%; height:100%;'><h3 style='margin-top:0.05vh;'>Check Products</h3></a>";
                        echo "</div>";

                    echo "</div>";
                echo "</center>";
            }
            else if($raodenoba>0 && $per_mass["Permision"]=="Curier")
            {
                $select_cur=mysql_query("select * from curiers where Login='$Login'");
                $cur_mass=mysql_fetch_array($select_cur);
                $cur_id=$cur_mass["cur_id"];

                echo "<center>";
                    echo "<div class='backadmin'>";

                        echo "<div class ='back_action'>";
                            echo "<a href = 'manager_and_curier/finish.php?cur_id=$cur_id' target='_blank' class = 'btn btn-primary' style='width:100%; height:100%;'><h3 style='margin-top:0.05vh;'>Check Products</h3></a>";
                        
                        echo "</div>";
                    echo "</div>";
                echo "</center>";
            }
            else if($raodenoba>0 && $per_mass["Permision"]=="Dissmis")
            {
                $msg="tqveni monacemebi washlilia";
                header("location:index.php?dismis=$msg");
            }
            else if($raodenoba>0)
            {
               echo "giorgi";
            }
            else
            {
                $msg="Enter valid login or password, please!!!";
                header("Location:index.php?alert=$msg");
            }

        ?>
        
            
            
            
            
        </div><!--end of container-->
        
    </body>
</html>