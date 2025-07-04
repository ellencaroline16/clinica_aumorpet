<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}

include 'conectar.php';

$mensagem = $_GET['mensagem'] ?? '';

$sql = "SELECT pet.id, pet.nome, especie, data_de_nascimento, tutores.nome AS nome_tutor
        FROM pet
        JOIN tutores ON pet.tutor_id = tutores.id
        ORDER BY pet.nome";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Pets</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Lista de Pets</h2>

    <?php if ($mensagem): ?>
      <p style="color: green;"><strong><?= htmlspecialchars($mensagem) ?></strong></p>
    <?php endif; ?>

    <?php if ($result && $result->num_rows > 0): ?>
      <table>
        <thead>
          <tr>
            <th>Nome</th>
            <th>Espécie</th>
            <th>Data de Nascimento</th>
            <th>Tutor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['nome']) ?></td>
            <td><?= htmlspecialchars($row['especie']) ?></td>
            <td><?= htmlspecialchars(date("d/m/Y", strtotime($row['data_de_nascimento']))) ?></td>
            <td><?= htmlspecialchars($row['nome_tutor']) ?></td>
            <td>
              <a href="editar_pet.php?id=<?= $row['id'] ?>" class="botao editar">Editar</a>
              <a href="deletar_pet.php?id=<?= $row['id'] ?>" class="botao excluir" onclick="return confirm('Tem certeza que deseja excluir este pet?');">Excluir</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>Nenhum pet cadastrado ainda.</p>
    <?php endif; ?>

    <br>
    <a href="dashboard.php" class="botao-voltar">Voltar ao Dashboard</a>
  </div>

  <footer>
    © 2025 Clínica AumorPet. Todos os direitos reservados.
  </footer>
</body>
</html>
