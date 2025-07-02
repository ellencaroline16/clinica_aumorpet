<?php
include 'conectar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $data_nasc = $_POST['data_de_nascimento'];
    $tutor_id = $_POST['tutor_id'];

    $sql = "UPDATE pet SET nome = ?, especie = ?, data_de_nascimento = ?, tutor_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $nome, $especie, $data_nasc, $tutor_id, $id);

    if ($stmt->execute()) {
        header("Location: listar_pet.php?mensagem=Pet atualizado com sucesso");
        exit();
    } else {
        echo "Erro ao atualizar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Requisição inválida.";
}
?>
