<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finca_cafetera";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("❌ Error de conexión: " . mysqli_connect_error());
}
?>