<?php
 
$host = '127.0.0.1';
$uname = 'root';
$pwd = '';
$db = 'android_database';
 
$con = mysql_connect($host, $uname, $pwd) or die('Connection Failed');
mysql_select_db($db, $con) or die('Database Selection Failed');
 
$query="SELECT * FROM add_fuel";
	
	$result=mysql_query($query);
	//the query you suggested has failed
	if(!$result) die ("Data base access fail: ".mysql_error());
	
	$rows=mysql_num_rows($result);
	while($row = mysql_fetch_array($result)){
	extract($row);
	//echo "$title";
	
	}
 
print(json_encode($row));
mysql_close($con);
 
?>