<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}

include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $data_nascimento = $_POST['data_de_nascimento'];
    $tutor_id = $_POST['tutor_id'];

    if (empty($tutor_id)) {
        echo "<p class='w3-panel w3-red'>Erro: Selecione um tutor antes de cadastrar o pet.</p>";
        return;
    }

    $sql = "INSERT INTO pet (nome, especie, data_de_nascimento, tutor_id)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome, $especie, $data_nascimento, $tutor_id);

    if ($stmt->execute()) {
        echo "<p class='w3-panel w3-green'>Pet cadastrado com sucesso! <a href='listar_pets.php'>Ver lista</a></p>";
    } else {
        echo "<p class='w3-panel w3-red'>Erro ao cadastrar pet: " . $stmt->error . "</p>";
    }

}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Pet</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container" style="background: linear-gradient(135deg, #d4f1f4, #fce4ec);">
<div class="w3-card w3-padding w3-margin w3-white" style="max-width:500px;margin:auto;">
    <h2>Cadastrar Pet</h2>
    <form method="POST">
        <input class="w3-input w3-margin-bottom" name="nome" placeholder="Nome do Pet" required>
        <input class="w3-input w3-margin-bottom" name="especie" placeholder="Espécie" required>
        <label>Data de Nascimento:</label>
        <input class="w3-input w3-margin-bottom" name="data_de_nascimento" type="date" required>

        <label>Selecione o Tutor:</label>
        <select class="w3-select w3-margin-bottom" name="tutor_id" required>
            <option value="">Selecione...</option>
            <?php
            $result = $conn->query("SELECT id, nome FROM tutores");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select>

        <button class="w3-button w3-teal" type="submit">Cadastrar</button>
    </form>
    <br>
    <a href="dashboard.php" class="w3-button w3-light-grey">Voltar</a>
</div>
</body>
</html>
