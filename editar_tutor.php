<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
include 'conectar.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tutores WHERE id = $id";
    $result = $conn->query($sql);
    $tutor = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE tutores SET nome='$nome', telefone='$telefone' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: listar_tutores.php");
        exit();
    } else {
        echo "Erro ao atualizar tutor.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar dados do Tutor</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            background: linear-gradient(135deg, #f7d1e0, #f8f1d6, #e6d5f7);
        }
        footer {
            text-align: center;
            margin-top: 30px;
            padding: 10px;
            background: #fff;
        }
    </style>
</head>
<body class="w3-container">
    <div class="w3-card w3-padding w3-margin w3-white" style="max-width:500px;margin:auto;">
        <h2>Editar Tutor</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $tutor['id'] ?>">
            <input class="w3-input w3-margin-bottom" name="nome" value="<?= $tutor['nome'] ?>" required>
            <input class="w3-input w3-margin-bottom" name="telefone" value="<?= $tutor['telefone'] ?>" required>
            <button class="w3-button w3-blue" type="submit">Salvar</button>
        </form>
        <br>
        <a href="listar_tutores.php" class="w3-button w3-light-grey">Cancelar</a>
    </div>
    <footer>
        © 2025 Clínica AumorPet. Todos os direitos reservados.
    </footer>
</body>
</html>
