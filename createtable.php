<?php

// DB connection info

$host = '';
$user = '';
$pwd = '';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
    
    $host = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $user = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $pwd = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

// $host = "localhost";
// $user = "root";
// $pwd = "";

$db = "registration";

try{
    
	$conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
    
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
	$sql = "CREATE TABLE registration_tbl(
                
		id INT NOT NULL AUTO_INCREMENT, 
                
		PRIMARY KEY(id),
                
		name VARCHAR(30),
                
		email VARCHAR(30),
                
		date DATE)";
    
	$conn->query($sql);

}

catch(Exception $e){
    
	die(print_r($e));

}

echo "<h3>Table created.</h3>";

?>