<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
include 'conectar.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Pet não encontrado.";
    exit;
}

$sql = "DELETE FROM pet WHERE id = $id";
if ($conn->query($sql)) {
    header("Location: listar_pets.php");
    exit();
} else {
    echo "Erro ao deletar o pet: " . $conn->error;
}
?>
