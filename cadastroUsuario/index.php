<?php include_once 'includes/header.php'; ?> <!-- Incluímos o cabeçalho -->

<a href="create.php" class="btn btn-primary mb-3">Adicionar Usuário</a> <!-- Link para a página de criação de usuário -->

<?php
// Incluímos os arquivos necessários.
include_once 'classes/Database.php';
include_once 'classes/User.php';

// Criamos uma nova instância da classe Database e obtemos a conexão.
$database = new Database();
$db = $database->getConnection();

// Criamos uma nova instância da classe User e passamos a conexão.
$user = new User($db);
// Chamamos o método read() para obter todos os usuários.
$stmt = $user->read();

// Iniciamos a tabela.
echo '<table class="table table-bordered">';
echo '<tr><th>ID</th><th>Nome</th><th>Email</th></tr>';

// Iteramos sobre os resultados e exibimos os usuários.
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row); // Extraímos os dados do array associativo
    echo '<tr>';
    echo '<td>' . $id . '</td>'; // Exibimos o ID
    echo '<td>' . $name . '</td>'; // Exibimos o nome
    echo '<td>' . $email . '</td>'; // Exibimos o email
    echo '</tr>';
}

// Fechamos a tabela.
echo '</table>';
?>

<?php include_once 'includes/footer.php'; ?> <!-- Incluímos o rodapé -->
