<?php
require 'db.php'; // Inclui o arquivo de conexão com o banco de dados
$id = $_GET['id']; // Obtém o ID do usuário a partir da URL
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?'); // Prepara a query para selecionar o usuário específico
$stmt->execute([$id]); // Executa a query com o ID fornecido
$user = $stmt->fetch(); // Obtém o usuário como um array associativo

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica se o método de requisição é POST
    $name = $_POST['name']; // Obtém o valor do campo 'name'
    $email = $_POST['email']; // Obtém o valor do campo 'email'
    $age = $_POST['age']; // Obtém o valor do campo 'age'

    $sql = "UPDATE users SET name = ?, email = ?, age = ? WHERE id = ?"; // Define a query SQL para atualização
    $stmt = $pdo->prepare($sql); // Prepara a query para execução
    $stmt->execute([$name, $email, $age, $id]); // Executa a query com os valores fornecidos

    header("Location: index.php"); // Redireciona para a página inicial
    exit; // Encerra a execução do script
}
?>
<form method="post">
    Nome: <input type="text" name="name" value="<?= $user['name'] ?>"><br> <!-- Campo para editar o nome -->
    Email: <input type="email" name="email" value="<?= $user['email'] ?>"><br> <!-- Campo para editar o email -->
    Idade: <input type="number" name="age" value="<?= $user['age'] ?>"><br> <!-- Campo para editar a idade -->
    <button type="submit">Atualizar</button> <!-- Botão para enviar o formulário -->
</form>
