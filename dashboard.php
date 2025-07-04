<?php
session_start();
if (!isset($_SESSION['usuario'])) {
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
  <style>
   
    ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    ul li {
      margin: 12px 0;
    }
  </style>
</head>
<body>
  <img src="banner aumigo.png" alt="Banner da Clínica AumorPet" class="banner-grande">

  <div class="container">
    <h2>Bem vindo (a) à clínica AumorPet</h2>
    <p>Como podemos te aujudar hoje?</p>
    <ul>
      <li><a href="cadastrar_tutor.php">Cadastrar Tutor</a></li>
      <li><a href="listar_tutores.php">Listar Tutores</a></li>
      <li><a href="cadastrar_pet.php">Cadastrar Pet</a></li>
      <li><a href="listar_pets.php">Listar Pets</a></li>
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
