<?php

include 'conectar.php';

if($_SERVER ['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST ['nome'];
    $email = $_POST ['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);


    $SQL = " INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email','$senha') ";

    if ($conn -> query($sql)) {
        echo "Parabéns, seu usuário foi cadastrado com sucesso. <a href= 'index.html'> Fazer login </a>";
    } else {
        echo "Erro ao realizar cadastro, tente novamente:" .$conn ->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Cadastro</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container">
  <div class="w3-card w3-padding w3-margin w3-light-grey" style="max-width:400px;margin:auto;">
    <h2>Cadastro</h2>
    <form method="POST">
      <input class="w3-input w3-margin-bottom" name="nome" placeholder="Nome" required>
      <input class="w3-input w3-margin-bottom" name="email" type="email" placeholder="Email" required>
      <input class="w3-input w3-margin-bottom" name="senha" type="password" placeholder="Senha" required>
      <button class="w3-button w3-green" type="submit">Cadastrar</button>
    </form>
  </div>
</body>
</html>