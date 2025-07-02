<?php
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
include 'conectar.php';

$sql = "SELECT * FROM tutores";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Tutores</title>
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
    <div class="w3-card w3-margin w3-white w3-padding">
        <h2>Lista de Tutores</h2>
        <table class="w3-table w3-striped w3-bordered">
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
            <?php while ($row = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $row['nome'] ?></td>
                <td><?= $row['telefone'] ?></td>
                <td>
                    <a class="w3-button w3-blue w3-small" href="editar_tutor.php?id=<?= $row['id'] ?>">Editar</a>
                    <a class="w3-button w3-red w3-small" href="excluir_tutor.php?id=<?= $row['id'] ?>" onclick="return confirm('Deseja excluir este tutor?')">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <br>
        <a href="dashboard.php" class="w3-button w3-light-grey">Voltar</a>
    </div>
    <footer>
        © 2025 Clínica AumorPet. Todos os direitos reservados.
    </footer>
</body>
</html>
