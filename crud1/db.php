<?php
$host = '127.0.0.1'; // Define o endereço do servidor MySQL
$db = 'crud_db'; // Define o nome do banco de dados
$user = 'root'; // Define o nome de usuário do MySQL
$pass = ''; // Define a senha do MySQL (em branco para este exemplo)
$charset = 'utf8mb4'; // Define o charset a ser utilizado

$dsn = "mysql:host=$host;dbname=$db;charset=$charset"; // Define a DSN (Data Source Name)
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Define o modo de erro do PDO como exceção
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Define o modo de busca padrão do PDO como array associativo
    PDO::ATTR_EMULATE_PREPARES   => false, // Desabilita a emulação de prepared statements do PDO
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options); // Cria uma nova instância de PDO
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode()); // Lança uma exceção em caso de erro
}
?>
