  <?php 

$icon = mysql_connect("localhost","root",""); 
if(!$icon) 
{ 
die('Could not connect : ' . mysql_error()); 
} 
mysql_select_db("android_database", $icon)or die("database selection error"); 

echo json_encode($data); 
$reg=$_POST['registration']; 
$name=$_POST['name']; 
$start_mileage = $_POST['start_mileage']; 
$company = $_POST['company']; 
$date = $_POST['date']; 

mysql_query("INSERT INTO USERS (registration,name,start_mileage,company,date) VALUES ('".$reg."', '".$name."', '".$start_mileage."', '".$company."', '".$date."')"); 
mysql_close($icon); 

?>