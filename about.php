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
	<li><a href="about.php" class="about_menu">Users</a></li>
	</ul>
	
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
				<!-- center Column 1 start -->
										<?php
				
			// Get all the data from the "example" table
		if(isset($_SESSION['company'])){$company = $_SESSION['company'];		
			
		$result = mysql_query("SELECT DISTINCT(registration) AS registration,name,start_mileage,date from users where company='$company';") 
		or die(mysql_error());  
		?><table class="imagetable">
<?php
		
		echo "<tr> <th>Name</th> <th>Start Mileage</th><th>Date</th></tr>";
		// keeps getting the next row until there are no more to get
		while($row = mysql_fetch_array( $result )) {
		extract($row);
		$dateFromDatabase = $date;
		$reverseDate = date("d-m-Y", strtotime($dateFromDatabase));
			// Print out the contents of each row into a table
			echo "<tr><td>"; 
			echo "<a href='about.php?registration=$registration'style='text-decoration:none;color:black'>$name </a>";
			echo "</td><td>"; 
			echo "$start_mileage";
			echo "</td><td>"; 
			echo "$reverseDate";
			
			}		
		}
		
		
?></table>
</br></br></br>
<?php
	if(isset($_GET['registration'])) {
				
				
				$registration = $_GET['registration'];
				
				?> 
				<table class="imagetable">
		<?php		
		echo "<tr> <th>Total Miles</th> <th>Total Fuel Spend</th><th>Hotel </th><th>Food</th><th>Materials</th><th>Other</th> </tr>";
	$query="select (select max(mileage) from add_fuel where  add_fuel.registration ='$registration')-(select  min(start_mileage) from users where users.registration='$registration')";
		
	$result=mysql_query($query);
	$row = mysql_fetch_row($result);
	echo "<tr><td>"; 
	echo "<a style='text-decoration:none;color:black'>$row[0]</a>";echo '</br>';
	echo "</td><td>";
	$query="select sum(total) from add_fuel where registration='$registration'";
	$result=mysql_query($query);
	$row = mysql_fetch_row($result);
	echo number_format($row[0],2);
	echo "</td><td>";
		
	$query="select sum(hotel) from expenses where registration='$registration'";
	$result=mysql_query($query);
	$row = mysql_fetch_row($result);
	echo number_format($row[0],2);
	echo "</td><td>";
	
	$query="select sum(food) from expenses where registration='$registration'";
	$result=mysql_query($query);
	$row = mysql_fetch_row($result);
	echo number_format($row[0],2);
	echo "</td><td>";
	$query="select sum(materials) from expenses where registration='$registration'";
	$result=mysql_query($query);
	$row = mysql_fetch_row($result);
	echo number_format($row[0],2);
	echo "</td><td>";
	$query="select sum(other) from expenses where registration='$registration'";
	$result=mysql_query($query);
	$row = mysql_fetch_row($result);
	echo number_format($row[0],2);
	
		}	
		else{
		echo '<h1>Choose a user for more details</h1>';
		}		
				
				

?> </table>
				<!-- center Column 1 end -->
			</div>
			<div class="col2">
				<!--  left Column 2 start -->
				<a href="index.php" class="left_home_menu">Home</a>
				<a href="fill.php" class="left_fill_menu">Fill Ups</a>
				<a href="planner.php" class="left_planner_menu">Planner</a>
				<a href="expenses.php" class="left_expenses_menu">Expenses</a>
				<a href="vechiles.php" class="left_vechiles_menu">Vechiles</a>
				<a href="about.php" class="left_about_menu">Users</a>
						<!-- left Column 2 end -->
			</div>
			<div class="col3">
				<!-- right Column 3 start -->
				<div class="right_list">
				<?php
				
			// Get all the data from the "example" table
		if(isset($_SESSION['company'])){$company = $_SESSION['company'];		
			
		$result = mysql_query("SELECT DISTINCT(registration) AS registration,name,company FROM users where company='$company';") 
		or die(mysql_error());  
		?><table class="imagetable">
<?php
		
		echo "<tr> <th>Registration</th> <th>Name</th><th>Company</th> </tr>";
		// keeps getting the next row until there are no more to get
		while($row = mysql_fetch_array( $result )) {
		extract($row);
			// Print out the contents of each row into a table
			echo "<tr><td>"; 
			echo "<a href='about.php?registration=$registration'style='text-decoration:none;color:black'>$registration </a>";
			echo "</td><td>"; 
			echo "$name ";
			echo "</td><td>"; 
			echo "$company";
			}		
		}
?>
</table>
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
