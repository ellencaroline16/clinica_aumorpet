<?php
$host = "localhost";
$dbname = "clinica_pet";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}
?>
