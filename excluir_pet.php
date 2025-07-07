<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}

include 'conectar.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM pet WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: listar_pets.php?mensagem=Pet deletado com sucesso");
        exit();
    } else {
        echo "Erro ao deletar pet: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID do pet não especificado.";
}
?>
