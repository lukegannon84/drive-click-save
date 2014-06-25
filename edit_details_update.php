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

 
 
mysql_query("UPDATE about SET registration='$reg', name='$name', start_mileage='$start_mileage',company='$company', date='$date'  WHERE registration='$reg'"); 
mysql_close($icon); 

?>