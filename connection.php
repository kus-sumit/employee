<?php
// Turn off error reporting
//error_reporting(0);

// Report runtime errors
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

$servername= "localhost";
$username= "root";
$password= "";
$database= "employee";

$conn= mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
?>

