<?php
session_start();
if (!isset ($_SESSION['usuario'])) {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Área do sistema</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container">
  <div class="w3-bar w3-blue">
    <span class="w3-bar-item">Olá, <?php echo $_SESSION['usuario']; ?>!</span>
    <a href="logout.php" class="w3-bar-item w3-button w3-right">Sair</a>
  </div>

  <h2 class="w3-margin-top">Área de administração</h2>
  <ul class="w3-ul">
    <li><a href="cadastrar_tutor.php">Cadastrar Tutor</a></li>
    <li><a href="listar_tutores.php">Listar Tutores</a></li>
  </ul>
</body>
</html>