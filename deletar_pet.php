<?php
<?php
include 'conectar.php';
session_start();

if (!isset($_SESSION['usuario'])) {
  header("Location: index.html");
  exit();
}

// Verifica se o ID do pet foi enviado
if (!isset($_GET['id'])) {
  echo "ID do pet não especificado.";
  exit();
}

$pet_id = $_GET['id'];
$sql = "SELECT * FROM pets WHERE id = $pet_id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
  echo "Pet não encontrado.";
  exit();
}

$pet = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar dados - Pet</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="fundo-gradiente">
  <div class="container">
    <h2>Editar Pet</h2>
    <form method="POST" action="atualizar_pet.php">
      <input type="hidden" name="id" value="<?php echo $pet['id']; ?>">
      <label>Nome:</label>
      <input class="w3-input w3-margin-bottom" name="nome" value="<?php echo $pet['nome']; ?>" required>

      <label>Espécie:</label>
      <input class="w3-input w3-margin-bottom" name="especie" value="<?php echo $pet['especie']; ?>" required>

      <label>Raça:</label>
      <input class="w3-input w3-margin-bottom" name="raca" value="<?php echo $pet['raca']; ?>" required>

      <label>Idade:</label>
      <input class="w3-input w3-margin-bottom" type="number" name="idade" value="<?php echo $pet['idade']; ?>" required>

      <button class="w3-button w3-blue" type="submit">Atualizar</button>
      <a href="listar_pets.php" class="botao-voltar">Cancelar</a>
    </form>
  </div>
</body>
</html>
