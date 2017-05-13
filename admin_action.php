<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <head>
        <meta charset="UTF-8" /> 
        <title></title>
        <link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
    </head>
    <html>
    <body>
        <?php 
                    $conn=mysql_pconnect("localhost","root");
                    $dbconn=mysql_select_db("online_store");
                    /*if(isset($_POST["Login"])){ $Login=$_POST["Login"];}
                    if(isset($_POST["Password"])){ $Password=$_POST["Password"];}
                    $select=mysql_query("select * from admin where Login='$Login' and Password='$Password'");
                    $raodenoba=mysql_num_rows($select);
                    if($raodenoba>0)
                        {*/
                            echo "<center>";
                                echo "<div id='registration'>";
                                    if(isset($_GET["shetyobineba"])){ $msg=$_GET["shetyobineba"]; echo $msg;}
                                    echo "<br />"."<br />";
                                        echo "<form action='index_action.php' method='post' class = 'form-group' >";
                                            echo "<input type='text' name='saxeli' class = 'form-control' placeholder='Name'>"."<br />";
                                            echo "<input type='text' name='gvari' class = 'form-control' placeholder='Surname'>"."<br />";
                                            echo "<input type='text' name='Login' class = 'form-control' placeholder='Login'>"."<br />";
                                            echo "<input type='password' name='password' class = 'form-control' placeholder='Password'>"."<br />";
                                            echo "<input type='password' name='password_confirm' class = 'form-control' placeholder='Confirm Password'>"."<br />";
                                            echo "<input type='email' name='email' class = 'form-control' placeholder='E-mail'>"."<br />";
                                            echo "<input type='text' name='Login' class = 'form-control' placeholder='Login'>"."<br />";
                                            
                                            echo "<label class='radio-inline'>";
                                            echo "<input type='radio' name='sex' value='male' checked class='radio-inline'>"."Male"."</input>";
                                            echo "</label>";
                                            echo "<label class='radio-inline'>";
                                            echo "<input type='radio' name='sex' value='female' class='radio-inline'>"."Female"."
                                            </input>";
                                            echo "</label>"."<br />"."<br />";
                                            echo "<input type='submit' value='Sign up' class = 'btn btn-primary'>";
                                        echo "</form>";
                                    echo "</div>";
                            echo "</center>";
                       // }
                  /*  else
                    {
                        $msg="Enter valid login or password, please!!!";
                        header("Location:ilogabelia_admin.php?alert=$msg");
                    }
        */
                ?>
        </body>
        </html>