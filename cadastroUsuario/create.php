<?php
include_once 'includes/header.php'; // Incluímos o cabeçalho
include_once 'classes/Database.php'; // Incluímos a classe Database
include_once 'classes/User.php'; // Incluímos a classe User

// Criamos uma nova instância da classe Database e obtemos a conexão.
$database = new Database();
$db = $database->getConnection();

// Criamos uma nova instância da classe User e passamos a conexão.
$user = new User($db);

// Verificamos se o formulário foi enviado.
if ($_POST) {
    // Definimos as propriedades do usuário com os valores do formulário.
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];

    // Tentamos criar o usuário e exibimos uma mensagem de sucesso ou erro.
    if ($user->create()) {
        echo '<div class="alert alert-success">Usuário criado com sucesso.</div>';
    } else {
        echo '<div class="alert alert-danger">Erro ao criar usuário.</div>';
    }
}
?>

<!-- Formulário de cadastro de usuário -->
<form action="create.php" method="post">
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<?php include_once 'includes/footer.php'; // Incluímos o rodapé ?>
