<?php

session_start();
include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($senha, $user['senha'])) {
            $_SESSION['usuario'] = $user['nome'];
            header("Location: welcome.php"); 
            exit();
        } else {
            echo "Essa senha é inválida.";
        }

    } else {
        echo "Esse usuário não foi encontrado.";
    }
    
}

?>
