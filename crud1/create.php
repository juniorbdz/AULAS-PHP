<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica se o método de requisição é POST
    require 'db.php'; // Inclui o arquivo de conexão com o banco de dados
    $name = $_POST['name']; // Obtém o valor do campo 'name'
    $email = $_POST['email']; // Obtém o valor do campo 'email'
    $age = $_POST['age']; // Obtém o valor do campo 'age'

    $sql = "INSERT INTO users (name, email, age) VALUES (?, ?, ?)"; // Define a query SQL para inserção
    $stmt = $pdo->prepare($sql); // Prepara a query para execução
    $stmt->execute([$name, $email, $age]); // Executa a query com os valores fornecidos

    header("Location: index.php"); // Redireciona para a página inicial
    exit; // Encerra a execução do script
}
?>
<form method="post">
    Nome: <input type="text" name="name"><br> <!-- Campo para inserir o nome -->
    Email: <input type="email" name="email"><br> <!-- Campo para inserir o email -->
    Idade: <input type="number" name="age"><br> <!-- Campo para inserir a idade -->
    <button type="submit">Criar</button> <!-- Botão para enviar o formulário -->
</form>
