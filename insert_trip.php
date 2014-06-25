  <?php 

$icon = mysql_connect("localhost","root",""); 
if(!$icon) 
{ 
die('Could not connect : ' . mysql_error()); 
} 
mysql_select_db("android_database", $icon)or die("database selection error"); 

echo json_encode($data); 
$depart=$_POST['depart']; 
$destination=$_POST['destination']; 
$startLocation = $_POST['start_location']; 
$startTime = $_POST['start_time']; 
$stopLocation = $_POST['stop_location']; 
$stopTime = $_POST['stop_time']; 
$reg = $_POST['registration'];
$company = $_POST['company']; 
$date = $_POST['date'];  
mysql_query("INSERT INTO trip (depart,destination,start_location,start_time,stop_location,stop_time,registration,company,date) VALUES ('".$depart."', '".$destination."', '".$startLocation."', '".$startTime."', '".$stopLocation."','".$stopTime."', '".$reg."', '".$company."', '".$date."')"); 
mysql_close($icon); 

?>