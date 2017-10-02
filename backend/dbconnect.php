<?php
if(!isset($_SESSION))
    {
        session_start();
    } 
include("passwords.php");

// Create connection
$conn = new mysqli($servername, $username, $password, "geofarm");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}






 ?>
