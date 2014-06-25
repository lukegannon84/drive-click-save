  <?php 

$icon = mysql_connect("localhost","root",""); 
if(!$icon) 
{ 
die('Could not connect : ' . mysql_error()); 
} 
mysql_select_db("android_database", $icon)or die("database selection error"); 

echo json_encode($data); 
$mileage=$_POST['mileage']; 
$date=$_POST['date']; 
$qty = $_POST['qty']; 
$price = $_POST['price']; 
$total = $_POST['total']; 
$reg = $_POST['registration']; 
$company = $_POST['company']; 
mysql_query("INSERT INTO add_fuel (mileage,date,qty,price,total,registration,company) VALUES ('".$mileage."', '".$date."', '".$qty."', '".$price."', '".$total."', '".$reg."','".$company."')"); 
mysql_close($icon); 

?>