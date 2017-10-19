<?php
$servername = "localhost";
$username = "root";
$password = "none";
$database = "php09_basic";

// Create connection
$conn_php09_basic = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn_php09_basic->connect_error) {
    die("Connection failed: " . $conn_php09_basic->connect_error);
} 
?>