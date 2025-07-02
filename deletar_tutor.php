<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
include 'conectar.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tutores WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: listar_tutores.php");
    } else {
        echo "Erro ao excluir tutor.";
    }
}
?>