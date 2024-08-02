<?php
// Definimos a classe User que vai representar um usuário no sistema.
class User {
    private $conn; // Propriedade que vai armazenar a conexão com o banco de dados
    private $table_name = 'users'; // Nome da tabela no banco de dados

    // Propriedades da classe que correspondem às colunas da tabela.
    public $id;
    public $name;
    public $email;
    public $password;

    // O construtor da classe recebe a conexão com o banco de dados.
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para criar um novo usuário no banco de dados.
    public function create() {
        // Definimos a query SQL para inserir um novo usuário.
        $query = 'INSERT INTO ' . $this->table_name . ' SET name=:name, email=:email, password=:password';
        // Preparamos a query.
        $stmt = $this->conn->prepare($query);

        // Sanitizamos os dados.
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        // Associamos os valores aos parâmetros da query.
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', password_hash($this->password, PASSWORD_BCRYPT));

        // Executamos a query e retornamos true em caso de sucesso, ou false em caso de falha.
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para ler todos os usuários do banco de dados.
    public function read() {
        // Definimos a query SQL para selecionar todos os usuários.
        $query = 'SELECT * FROM ' . $this->table_name;
        // Preparamos a query.
        $stmt = $this->conn->prepare($query);
        // Executamos a query.
        $stmt->execute();
        // Retornamos o resultado da query.
        return $stmt;
    }
}
?>
