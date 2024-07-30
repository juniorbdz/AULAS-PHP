<?php
require 'db.php'; // Inclui o arquivo de conexão com o banco de dados
$stmt = $pdo->query('SELECT * FROM users'); // Executa a query para selecionar todos os usuários
$users = $stmt->fetchAll(); // Obtém todos os resultados como um array associativo
?>
<a href="create.php">Criar Novo Usuário</a> <!-- Link para a página de criação de usuário -->
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Idade</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($users as $user): ?> <!-- Loop através de todos os usuários -->
        <tr>
            <td><?= $user['id'] ?></td> <!-- Exibe o ID do usuário -->
            <td><?= $user['name'] ?></td> <!-- Exibe o nome do usuário -->
            <td><?= $user['email'] ?></td> <!-- Exibe o email do usuário -->
            <td><?= $user['age'] ?></td> <!-- Exibe a idade do usuário -->
            <td>
                <a href="edit.php?id=<?= $user['id'] ?>">Editar</a> <!-- Link para a página de edição -->
                <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Tem certeza?')">Deletar</a> <!-- Link para a página de deleção com confirmação -->
            </td>
        </tr>
    <?php endforeach; ?>
</table>
