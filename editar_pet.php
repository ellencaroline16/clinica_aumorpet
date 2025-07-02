<?php
include("conexao.php");

$id = $_GET["id"];
$sql = "SELECT * FROM pet WHERE id = $id";
$result = mysqli_query($conn, $sql);
$pet = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Pet</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <h1>Editar dados do Pet</h1>
        <form action="atualizar_pet.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $pet['id']; ?>">
            
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $pet['nome']; ?>" required>

            <label for="especie">Espécie:</label>
            <input type="text" name="especie" value="<?php echo $pet['especie']; ?>" required>

            <label for="data_de_nascimento">Data de Nascimento:</label>
            <input type="date" name="data_de_nascimento" value="<?php echo $pet['data_de_nascimento']; ?>" required>

            <label for="tutor_id">ID do Tutor:</label>
            <input type="number" name="tutor_id" value="<?php echo $pet['tutor_id']; ?>" required>

            <input type="submit" value="Atualizar">
        </form>
        <a href="listar_pets.php" class="voltar">Voltar à lista</a>
    </div>
</body>
</html>
