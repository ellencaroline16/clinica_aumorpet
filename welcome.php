<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Bem-vindo(a)</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .welcome-container {
      text-align: center;
      padding: 50px 20px;
    }

    .welcome-container h1 {
      font-size: 2.5em;
      color: #6d4c41;
    }

    .welcome-container p {
      font-size: 1.2em;
      color: #333;
      margin-top: 10px;
    }

    .pet-gifs {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 30px;
    }

    .pet-gifs img {
      width: 150px;
      height: auto;
      border-radius: 10px;
      transition: transform 0.3s ease-in-out;
    }

    .pet-gifs img:hover {
      transform: scale(1.1);
    }

    .btn-dashboard {
      display: inline-block;
      margin-top: 40px;
      padding: 12px 30px;
      background-color: #9c27b0;
      color: white;
      text-decoration: none;
      border-radius: 25px;
      transition: background 0.3s;
    }

    .btn-dashboard:hover {
      background-color: #7b1fa2;
    }
  </style>
</head>
<body>
  <div class="welcome-container">
    <h1>Olá, <?php echo $_SESSION['usuario']; ?>! 🐶🐱🐰</h1>
    <p>Bem-vindo(a) à Clínica AumorPet! Estamos felizes em ter você aqui.</p>

    <div class="pet-gifs">
      <img src="cachorro.gif" alt="Cachorro animado">
      <img src="gato.gif" alt="Gato animado">
      <img src="coelho.gif" alt="Coelho animado">
    </div>

    <a class="btn-dashboard" href="dashboard.php">Ir para o Dashboard</a>
  </div>

  <footer>
    © 2025 Clínica AumorPet. Todos os direitos reservados.
  </footer>
</body>
</html>
