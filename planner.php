<?php
session_start();
?><?php
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
global $startLat;
global $startLon;
global $stopLat;
global $stopLon;
global $timeTaken;
global $speed;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
<head>
 <meta charset="UTF-8" />
    <title>Drive Click Save</title>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
      function calculateRoute(from, to) {
        // Center initialized to Naples, Italy
        var myOptions = {
          zoom: 10,
          center: new google.maps.LatLng(40.84, 14.25),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        // Draw the map
        var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
 
        var directionsService = new google.maps.DirectionsService();
        var directionsRequest = {
          origin: from,
          destination: to,
          travelMode: google.maps.DirectionsTravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC
        };
        directionsService.route(
          directionsRequest,
          function(response, status)
          {
            if (status == google.maps.DirectionsStatus.OK)
            {
              new google.maps.DirectionsRenderer({
                map: mapObject,
                directions: response
              });
            }
            else
              $("#error").append("Unable to retrieve your route<br />");
          }
        );
      }
 
      $(document).ready(function() {
        // If the browser supports the Geolocation API
        if (typeof navigator.geolocation == "undefined") {
          $("#error").text("Your browser doesn't support the Geolocation API");
          return;
        }
 
        $("#from-link, #to-link").click(function(event) {
          event.preventDefault();
          var addressId = this.id.substring(0, this.id.indexOf("-"));
 
          navigator.geolocation.getCurrentPosition(function(position) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
              "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
            },
            function(results, status) {
              if (status == google.maps.GeocoderStatus.OK)
                $("#" + addressId).val(results[0].formatted_address);
              else
                $("#error").append("Unable to retrieve your address<br />");
            });
          },
          function(positionError){
            $("#error").append("Error: " + positionError.message + "<br />");
          },
          {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
          });
        });
 
        $("#calculate-route").submit(function(event) {
          event.preventDefault();
          calculateRoute($("#from").val(), $("#to").val());
        });
      });
    </script>
    <style type="text/css">
      #map {
        width: 500px;
        height: 400px;
        margin-top: 10px;
      }
    </style>
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
				//check to see if there is something to get from the url
				if(isset($_GET['registration'])) {
				?><h1><?php print $_GET['registration']; ?></h2><?php
				
				$registration = $_GET['registration'];
		$query="SELECT id,depart,destination,start_time,stop_time,timediff(stop_time,start_time) from trip where registration='$registration'";
	$result=mysql_query($query);
		?><table class="imagetable">
<?php
		
		echo "<tr><th>ID</th>  <th>Depart</th> <th>Arrive</th><th>Start Time</th><th>Stop Time</th> <th>Time taken</th> </tr>";
		// keeps getting the next row until there are no more to get
		while($row = mysql_fetch_array( $result )) {
		extract($row);
			// Print out the contents of each row into a table
			echo "<tr><td>"; 
			echo "<a href='planner.php?id=$id'style='text-decoration:none;color:black'>$row[0] </a>";
			echo "</td><td>"; 
			echo "<a href='planner.php?id=$id'style='text-decoration:none;color:black'>$row[1]";
			echo "</td><td>"; 
			echo "$row[2]";
			echo "</td><td>"; 
			echo "$row[3]";
			echo "</td><td>"; 
			echo "$row[4]";
			echo "</td><td>";
			echo "$row[5]";
			//echo "</tr>";
			
		} 
	
				}
else{
		echo '<h1>Please Choose from list at the side</h1>';
		}				
		
?>
		</table><?php
	if(isset($_GET['id'])) {
				
				
				$id = $_GET['id'];
	$result = mysql_query("SELECT start_location,stop_location,depart,destination,start_time,stop_time,timediff(stop_time,start_time)  FROM trip WHERE id = '$id'");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($result);

?><table class="imagetable">
<?php
		
		echo "<tr> <th>Depart</th> <th>Arrive</th><th>Start Time</th><th>Stop Time</th><th>Time Taken</th> </tr>";
			echo "<tr><td>"; 
			echo "<a href='planner.php?id=$id'style='text-decoration:none;color:black'>$row[2] </a>";
			echo "</td><td>"; 
			echo "$row[3]";
			echo "</td><td>"; 
			echo "$row[4]";
			echo "</td><td>"; 
			echo "$row[5]";
			echo "</td><td>"; 
			echo "$row[6]";					
		
					

}



		
?></table> <?php 


//Work out distance between 2 geo points
    function distance($lat1, $lng1, $lat2, $lng2, $miles = false)
    {
    $pi80 = M_PI / 180;
    $lat1 *= $pi80;
    $lng1 *= $pi80;
    $lat2 *= $pi80;
    $lng2 *= $pi80;
     
    $r = 6372.797; // mean radius of Earth in km
    $dlat = $lat2 - $lat1;
    $dlng = $lng2 - $lng1;
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $km = $r * $c;
     
    return ($miles ? ($km * 0.621371192) : $km);
    }

 echo"</br>";
 ?>
<?php
//get the lat lon values from trip table use comma as delimiter
if(isset($_GET['id'])) {
$data = $row[0];
list($startLat,$startLon) = explode(",", $data);

$data = $row[1];
list($stopLat,$stopLon) = explode(",", $data);


	?><table class="imagetable"><?php	
		echo "<tr> <th>Distance Travelled</th><th>Avg Speed Travelled</th> </tr>";
		echo "<tr><td>"; //distanced travelled
 echo  number_format(distance($startLat,$startLon,$stopLat,$stopLon),1)." Km";
 echo "</td><td>";  //distanced travelled
// echo  distance($startLat,$startLon,$stopLat,$stopLon)/$timeTaken;
 $distanceTaken= distance($startLat,$startLon,$stopLat,$stopLon);
 
 //$avgSpeed=$distanceTaken/$time;
//echo $avgSpeed;

$current_time_in_seconds=$row[6];
list($hours, $minutes, $seconds) = explode(":", $current_time_in_seconds);

$current_time_in_seconds=$hours*3600+$minutes*60+$seconds;
$time= $current_time_in_seconds/60;
$speed=$distanceTaken/$time;
echo number_format($speed*60,1);
 }
//



 
//echo avgSpeed($timeTaken,$distanceTaken); 
 //echo $distanceTaken;
 //$time=$timeTaken;
 //$speed=$distanceTaken/intval($timeTaken);
 //echo $speed;
 //echo intval(
?>
</table>
<h1>Calculate your route</h1>
<pre>
    <form id="calculate-route" name="calculate-route" action="#" method="get">
      <label for="from">From:</label>    <input type="text" id="from" name="from" required="required" value="<?php if(isset($_GET['id'])) {echo $row[0];}else{ print "";}?>" size="30" />
      
 
      <label for="to">To:</label>      <input type="text" id="to" name="to" required="required" value="<?php if(isset($_GET['id'])) {echo $row[1];}else{ print "";}?>" size="30" />
     
 </pre>
      <input type="submit" />
      <input type="reset" />
    </form>
    <div id="map"></div>
    <p id="error"></p>

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
			echo "<a href='planner.php?registration=$registration'style='text-decoration:none;color:black'>$registration </a>";
			echo "</td><td>"; 
			echo "<a href='planner.php?name=$name' style='text-decoration:none;color:black'>$name </a>";
			echo "</td><td>"; 
			echo "<a href='planner.php?company=$company' style='text-decoration:none;color:black'>$company </a>";
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