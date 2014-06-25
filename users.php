<?php
session_start();
?><?php
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
<ul>
<li><img src="images/logo.png" alt="logo" width="30%" height="10%"></li>
	
	<li><a href="index.php" class="home_menu">Home</a></li>
	<li><a href="fill.php" class="fill_menu">Fill Ups</a></li>
	<li><a href="planner.php" class="planner_menu">Planner</a></li>
	<li><a href="expenses.php" class="expenses_menu">Expenses</a></li>
	<li><a href="vechiles.php" class="vechiles_menu">Vechiles</a></li>
	<li><a href="about.php" class="about_menu">about</a></li>
	</ul>
	
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- center Column 1 start -->
				<h1>How MyCarTracks works?</h1>
				<p>MyCarTracks is developed around GPS tracking unit which is your mobile
				device (phone or tablet) or device of your employee.
				All tracked data like GPS position and mileage data are sent through GSM data plan (e.g. 3G, 4G/LTE)
				or Wi-Fi to mycartracks.com where they are stored. With Web Management Application on mycartracks.com you can 
				view all tracked data in easy to use and clear way, generate reports for tax, payment or billing purposes 
				and manage your fleet.</p>
				
				<img src="images/how_it_works.png" alt="how it works">
				<!-- center Column 1 end -->
			</div>
			<div class="col2">
				<!--  left Column 2 start -->
				<a href="index.php" class="left_home_menu">Home</a>
				<a href="fill.php" class="left_fill_menu">Fill Ups</a>
				<a href="planner.php" class="left_planner_menu">Planner</a>
				<a href="expenses.php" class="left_expenses_menu">Expenses</a>
				<a href="vechiles.php" class="left_vechiles_menu">Vechiles</a>
				<a href="about.php" class="left_about_menu">about</a>
						<!-- left Column 2 end -->
			</div>
			<div class="col3">
				<!-- right Column 3 start -->
				<div class="right_list">
				<?php
				
			// Get all the data from the "example" table
		if(isset($_SESSION['company'])){$company = $_SESSION['company'];		
			
		$result = mysql_query("SELECT DISTINCT(registration) AS registration,name,company FROM about where company='$company';") 
		or die(mysql_error());  
		?><table class="imagetable">
<?php
		
		echo "<tr> <th>Registration</th> <th>Name</th><th>Company</th> </tr>";
		// keeps getting the next row until there are no more to get
		while($row = mysql_fetch_array( $result )) {
		extract($row);
			// Print out the contents of each row into a table
			echo "<tr><td>"; 
			echo "<a href='fill.php?registration=$registration'style='text-decoration:none;color:black'>$registration </a>";
			echo "</td><td>"; 
			echo "<a href='fill.php?name=$name' style='text-decoration:none;color:black'>$name </a>";
			echo "</td><td>"; 
			echo "<a href='fill.php?company=$company' style='text-decoration:none;color:black'>$company </a>";
			}		
		}
?>
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
