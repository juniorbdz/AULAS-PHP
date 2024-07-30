<?php
require 'db.php'; // Inclui o arquivo de conexão com o banco de dados
$id = $_GET['id']; // Obtém o ID do usuário a partir da URL
$sql = "DELETE FROM users WHERE id = ?"; // Define a query SQL para deleção
$stmt = $pdo->prepare($sql); // Prepara a query para execução
$stmt->execute([$id]); // Executa a query com o ID fornecido

header("Location: index.php"); // Redireciona para a página inicial
exit; // Encerra a execução do script
?>
