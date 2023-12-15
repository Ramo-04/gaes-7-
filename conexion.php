<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "promec_jr2";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}