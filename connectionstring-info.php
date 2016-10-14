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

echo "<h3>Host: $host </h3>";

echo "<h3>User: $user </h3>";

echo "<h3>Password: $pwd </h3>";

?>