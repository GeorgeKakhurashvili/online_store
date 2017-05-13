<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <head>
        <meta charset="UTF-8" /> 
        <title></title>
        <link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
    </head>
   
    <body>
            <div id="admin_con">
                <?php 
                    echo "<center>"; 
                        echo "<div id='form7'>";
                            echo "<h2 style='font-family:Myriad Pro;'>Log in</h2>";
                            if(isset($_GET["alert"])){$msg=$_GET["alert"]; echo "<center>".$msg."</center>";}
                            if(isset($_GET["dismis"])){$msg1=$_GET["dismis"]; echo "<center>".$msg1."</center>";}

                            echo "<form action='admin_action1.php' method='post' class ='form-group'>";
                                echo "<input type='text' name='Login' class = 'form-control' placeholder='Login' style='width:70%;'>"."<br />";
                                echo "<input type='password' name='Password' class = 'form-control' placeholder='Password' style='width:70%;'>"."<br/>";
                                echo "<input type='submit' value='Login' class = 'btn btn-primary' style='width:30%; float:left; margin-left:7.5vh;'>"."<a href='update_password.php' target='_blank' style='float:left; margin-left:3vh; margin-top:1vh;' >Forgot Password?</a>";
                            echo "</form>";//end of form
                        echo "</div>"; 
                        echo "</center>";
                ?>      
                
                
                
            </div><!--end of admin_con-->

        
        
    </body>
</html>