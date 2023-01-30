<?php

$servername = "localhost";
$uname = "root";
$password = "";
$db = "prodigystudio";

// Create connection
$conn = new mysqli($servername, $uname, $password, $db);

// Check connection
if ($conn->connect_error) {
  header('location:/error.php');
}
