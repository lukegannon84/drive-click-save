  <?php 

$icon = mysql_connect("localhost","root",""); 
if(!$icon) 
{ 
die('Could not connect : ' . mysql_error()); 
} 
mysql_select_db("android_database", $icon)or die("database selection error"); 

echo json_encode($data); 
$hotel=$_POST['hotel']; 
$food=$_POST['food']; 
$materials = $_POST['materials']; 
$other = $_POST['other']; 
$notes = $_POST['notes']; 
$reg = $_POST['registration']; 
$company = $_POST['company']; 
$date = $_POST['date'];
mysql_query("INSERT INTO expenses (hotel,food,materials,other,notes,registration,company,date) VALUES ('".$hotel."', '".$food."', '".$materials."', '".$other."', '".$notes."','".$reg."', '".$company."', '".$date."')"); 
mysql_close($icon); 

?>