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
            session_start();
            $conn=mysql_pconnect("localhost","root");
            $dbconn=mysql_select_db("online_store");
            if(isset($_POST["Login"])){ $Login=$_POST["Login"]; }
            if(isset($_POST["Password"])){ $Password=$_POST["Password"];}
            $_SESSION["check"]=0;
            $select=mysql_query("select * from users where Login='$Login' and Password1='$Password'");
            $raodenoba=mysql_num_rows($select);
            $mass=mysql_fetch_array($select);
            $user_id=$mass["record_id"];
            if($raodenoba>0)
            {
                $_SESSION["check"]=1;
                $check=$_SESSION["check"];
                header("Location:index.php?check=$check&user_id=$user_id");
                
            }
            else
            {
                $_SESSION["check"]=0;
                $msg="Enter valid login or password, please!!!";
                header("Location:login.php?alert=$msg");
                
            }

        ?>
        
            
            
            
            
        </div><!--end of container-->
        
    </body>
</html>