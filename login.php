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

<b>
<form method="POST" action="login.php" >
<p>company: <input type="text" name="company" placeholder="You company name"/></p>
<p>Password: <input type="password" name="password" /></p>
<p><input type="submit" value="Sign in" /><a href="signup.php" style="text-decoration:none"><form method="POST" action="signup.php"><input type="button" value="Sign Up??"></form></a></p>
</form></b>
<?php

$db_hostname='localhost';
$db_database='android_database';
$db_company='root';
$db_password='';
	$connection=mysql_connect($db_hostname,$db_company,$db_password) or die(mysql_connect_error());

		
		echo("</br>");
	//connects to the required database or fails
	mysql_select_db("android_database") or die("Unable to select database: ".mysql_error());
		echo("</br>");
		


	if (isset($_POST['company']) && isset($_POST['password']))
{
		if(!empty($_POST['company'])){
		//$company=stripslashes($company);
		//$company=htmlentities($company);
		//$company=strip_tags($company);
		$company = mysql_real_escape_string($_POST['company']);}
		else{
		echo "<h3>Please enter company<br/></h3>";
		$company = NULL;
		}
		if(!empty($_POST['password'])){
		//$password=stripslashes($password);
		//$password=htmlentities($password);
		//$password=strip_tags($password);
		$password = mysql_real_escape_string($_POST['password']);}
		else{
		echo "<h3>Please enter password<br/></h3>";
		$password = NULL;
		}
		

$query = "SELECT company FROM company WHERE company='$company' AND password='$password'";

	
$result=mysql_query($query);
	//the query you suggested has failed
	if(!$result) die ("Data base access fail: ".mysql_error());

	
	$rows=mysql_num_rows($result);
		
	while($row = mysql_fetch_array($result)){
	extract($row);
		$_SESSION['company']=$company;
	header('Location: index.php');
	}
					
	}
mysql_close($connection);
?>
				<!-- center Column 1 end -->
			</div>
			<div class="col2">
				<!--  left Column 2 start -->
				
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
