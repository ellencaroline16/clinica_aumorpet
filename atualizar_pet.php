<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}

include 'conectar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id     = intval($_POST['id']);
    $nome   = trim($_POST['nome']);
    $especie = trim($_POST['especie']);
    $raca   = trim($_POST['raca']);
    $idade  = intval($_POST['idade']);

    $sql = "UPDATE pet SET nome = ?, especie = ?, raca = ?, idade = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $nome, $especie, $raca, $idade, $id);

    if ($stmt->execute()) {
        header("Location: listar_pet.php?mensagem=Pet atualizado com sucesso");
        exit();
    } else {
        echo "Erro ao atualizar pet: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Requisição inválida.";
}
?>
