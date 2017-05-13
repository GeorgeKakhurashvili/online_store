<!DOCTYPE html>
<html>
	<head>
		<title>Sign Up</title>
		<meta charset="UTF-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="style/style.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</head>

	<body>
		

		<div id="registration">
			<h2 id = "first"> Update</h2>
			<?php  
			$conn=mysql_pconnect("localhost","root");
            $dbconn=mysql_select_db("online_store");
            $id=$_GET["record_id"];
            $select=mysql_query("select * from admin where record_id='$id'");
            $mass=mysql_fetch_array($select);
             echo "<form action='updating_action.php' method='post' class = 'form-group' >";
                    echo "<input type='text' name='Name' value ='$mass[Name]' class = 'form-control' placeholder='Name'>"."<br />";
                    echo "<input type='text' name='Surname' value ='$mass[Surname]' class = 'form-control' placeholder='Surname'>"."<br />";
                    echo "<input type='Email' name='Email' value ='$mass[Email]' class = 'form-control' placeholder='Email'>"."<br />";
                    echo "<input type='text' name='Personal_id' value ='$mass[Personalid]' class = 'form-control' placeholder='Personalid'>"."<br />";
                    echo "<input type='text' name='Phone' class = 'form-control' value ='$mass[Phonenumber]' placeholder='Phone'>"."<br />";
                    echo "<input type = 'date' max='2005-12-31' class = 'form-control' value ='$mass[Birthdate]' name = 'birthdate' required='required' ></br>";
                    echo "<textarea rows='8' placeholder='Reason of Dissmis' class = 'form-control' name='reason'>";
                    		echo $mass["Status"];

					echo "</textarea>"."<br />";
					
					$select1=mysql_query("select * from permisions");
					$raod=mysql_num_rows($select1);
            	
					echo "<select class = 'form-control' name='permision'>";
					for ($i=0; $i <$raod ; $i++) 
					{ 

						$mass1=mysql_fetch_array($select1);
						if($mass1["per_id"]==$mass["Permision"])
						{
				     	echo "<option value='$mass1[Permision]' selected>$mass1[Permision]</option>";
				     	}
				     	else
				     	{
				     		echo "<option value='$mass1[Permision]'>$mass1[Permision]</option>";
				     	}
				 	} 
				  
				  
					echo "</select>"."<br />";
				
					echo "<input type='submit' value='Update' class = 'btn btn-primary'>";
            echo "</form>";

			?>
		</div><br><br>

	</body>

</html>