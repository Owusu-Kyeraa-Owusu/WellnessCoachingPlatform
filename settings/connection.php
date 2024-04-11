<?php
// Database connection parameters
$servername = "s54ham9zz83czkff.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "e202g0zu97wm7b1l";
$password = "ry6qgj3sb8rvagaf";
$database = "phjkciqofa72gv0j";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>
