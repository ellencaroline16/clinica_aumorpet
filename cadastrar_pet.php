<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
include 'conectar.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $tutor_id = $_POST['tutor_id'];

    $sql = "INSERT INTO pets (nome, especie, raca, idade, tutor_id)
            VALUES ('$nome', '$especie', '$raca', $idade, $tutor_id)";

    if ($conn->query($sql)) {
        $mensagem = "Pet cadastrado com sucesso!";
    } else {
        $mensagem = "Houve um erro ao cadastrar o pet: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cadastro do Pet</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Cadastrar Pet</h2>
    <?php if ($mensagem): ?>
      <p class="mensagem"><?= $mensagem ?></p>
    <?php endif; ?>
    <form method="POST">
      <input type="text" name="nome" placeholder="Nome do Pet" required>
      <input type="text" name="especie" placeholder="Espécie (ex: cachorro, gato...)" required>
      <input type="text" name="raca" placeholder="Raça" required>
      <input type="number" name="idade" placeholder="Idade" required>
      <input type="number" name="tutor_id" placeholder="ID do Tutor" required>
      <button type="submit">Cadastrar</button>
    </form>
    <br>
    <a href="dashboard.php">← Voltar ao Dashboard</a>
  </div>

  <footer>
    <p>© 2025 Clínica AumorPet. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
