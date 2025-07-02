<?php

include 'conectar.php';

if($_SERVER ['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST ['nome'];
    $email = $_POST ['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);


    $sql = " INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email','$senha') ";

    if ($conn -> query($sql)) {
        echo "Parabéns, seu usuário foi cadastrado com sucesso. <a href= 'index.html'> Fazer login </a>";
    } else {
        echo "Erro ao realizar cadastro, tente novamente:" .$conn ->error;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Registrar</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <img src="https://media.giphy.com/media/BzyTuYCmvSORqs1ABM/giphy.gif" alt="animal fofo" class="decorativa">
    <h2>Cadastro</h2>
    <form method="POST">
      <input name="nome" placeholder="Nome" required>
      <input name="email" type="email" placeholder="Email" required>
      <input name="senha" type="password" placeholder="Senha" required>
      <button type="submit">Cadastrar</button>
    </form>
    <p>Já tem conta? <a href="index.html">Faça login</a></p>
  </div>
  <footer>
    © 2025 Clínica AumorPet. Todos os direitos reservados.
  </footer>
</body>
</html>