<?php
session_start();
?>

<?php
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
<head>
	<title>Drive Click Save</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="description" content="The Perfect 3 Column Liquid Layout: No CSS hacks. SEO friendly. iPhone compatible." />
	<meta name="keywords" content="The Perfect 3 Column Liquid Layout: No CSS hacks. SEO friendly. iPhone compatible." />
	<meta name="robots" content="index, follow" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>

<div id="header">

<img src="images/logo.png" alt="logo" width="30%" height="10%">
	
	
	
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
	
			<div class="col1">
				<!-- center Column 1 start -->
				<img src="images/how_it_works.png" alt="how it works"> 
		

<?php

	$db_hostname='127.0.0.1';
	$db_database='android_database';
	$db_company='root';
	$db_password='';
	$connection=mysql_connect($db_hostname,$db_company,$db_password) or die(mysql_connect_error());

		
		echo("</br>");
	//connects to the required database or fails
	mysql_select_db("android_database") or die("Unable to select database: ".mysql_error());
		echo("</br>");
		


	if (isset($_POST['company']) && isset($_POST['password']))
{		//checks to see if fields are left empty
		if(!empty($_POST['company'])){
			$company=stripslashes($company);
			$company=htmlentities($company);				//Cleans up the users input
			$company=strip_tags($company);
			$company = mysql_real_escape_string($_POST['company']);
		}
		
		else{
			echo "<h3>Please enter company<br/></h3>";
			$company = NULL;
		}
		
		if(!empty($_POST['password'])){
			$password=stripslashes($password);				//Cleans up the users input
			$password=htmlentities($password);
			$password=strip_tags($password);
			$password = mysql_real_escape_string($_POST['password']);
		}
		
		else{
			echo "<h3>Please enter password<br/></h3>";
			$password = NULL;
		}		
		

	$query = "SELECT * FROM company WHERE company='$company'";

		
	$result=mysql_query($query);
	//the query you suggested has failed
	if(!$result) die ("Data base access fail: ".mysql_error());
	
	
	//if there is a match in the database return 1 otherwise return 0
	if(mysql_num_rows($result) == 1){
		echo "<h3>Sorry this company name is already taken. Please try again!";
	}

	else{
	
		
			//the query you suggested has failed
			if(!$result){ die ("Data base access fail: ".mysql_error());}
		else{
			   $query="INSERT INTO company (company,password)VALUES('$company','$password')";
			
			
			echo "<h3>You have successfully registered!";
			$_SESSION['company']=$company;
			 //Once you have registered your company is saved for the session
			echo("</br>");
			echo "Welcome	
			{$_SESSION['company']}</h3>";
			header('Location: index.php');
			}
			
			 
			 
			if (!mysql_query($query, $connection))
					echo "INSERT failed: This company title is already in the database";
			
		}
	}		

		//close SQL connection
		mysql_close($connection);
?>
				<!-- center Column 1 end -->
			</div>
			<div class="col2">
				<!--  left Column 2 start -->
				<h1>Welcome</h1></br></br></br>
					<b>
<form method="POST" action="signup.php" >
<p>company: <input type="text" name="company" /></p>
<p>Password: <input type="password" name="password" /></p>
<p><input type="submit" value="Register" /></p>
</form></b>
						<!-- left Column 2 end -->
			</div>
			<div class="col3">
				<!-- right Column 3 start -->
				<div class="right_list">
				
				</div>
				<!-- right Column 3 end -->
			</div>
		</div>
	</div>
</div>
<div id="footer">
</div>

</body>
</html>
