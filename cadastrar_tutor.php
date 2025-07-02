<?php
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO tutores (nome, telefone) VALUES ('$nome', '$telefone')";
    if ($conn->query($sql)) {
        echo "<p class='w3-panel w3-green'>Tutor cadastrado com sucesso! <a href='listar_tutores.php'>Ver lista</a></p>";
    } else {
        echo "<p class='w3-panel w3-red'>Erro ao cadastrar tutor: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Tutor</title>
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
        <h2>Cadastrar Tutor</h2>
        <form method="POST">
            <input class="w3-input w3-margin-bottom" name="nome" placeholder="Nome do Tutor" required>
            <input class="w3-input w3-margin-bottom" name="telefone" placeholder="Telefone" required>
            <button class="w3-button w3-pink" type="submit">Cadastrar</button>
        </form>
        <br>
        <a href="dashboard.php" class="w3-button w3-light-grey">Voltar</a>
    </div>
    <footer>
        © 2025 Clínica AumorPet. Todos os direitos reservados.
    </footer>
</body>
</html>
