<?php
$host = "localhost";
$dbname = "clinica_pet";
$user = "root";
$pass = "";

$conn = new mysqli('localhost', 'root', '', 'clinica_aumorpet', 3307);

if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}
?>
