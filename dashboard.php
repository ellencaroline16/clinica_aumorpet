<?php
session_start();
if (!isset ($_SESSION['usuario'])) {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <img src="banner aumigo.png" alt="banner" class="decorativa">
    <h2>Bem-vindo à Clínica AumorPet</h2>
    <p>Como podemos te ajudar? </p>
    <ul>
      <li><a href="cadastrar_tutor.php">Cadastrar Tutor</a></li>
      <li><a href="listar_tutores.php">Listar Tutores</a></li>
      <li><a href="sobre.html">Sobre Nós</a></li>
      <li><a href="logout.php">Sair</a></li>
    </ul>
  </div>
  
  <div class="gif-container">
  <img src="cachorro.gif" alt="Cachorro" class="gif hide-on-load">
  <img src="gato.gif" alt="Gato" class="gif hide-on-load">
  <img src="coelho.gif" alt="Coelho" class="gif hide-on-load">
</div>

  <footer>
    © 2025 Clínica AumorPet. Todos os direitos reservados.
  </footer>
</body>
</html>