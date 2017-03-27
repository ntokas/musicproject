<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Chinook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET CHARACTER_SET_CLIENT='utf8'");
$conn->query("SET CHARACTER_SET_RESULTS='utf8'");
$conn->query("SET CHARACTER_SET_CONNECTION='utf8'");
?>
