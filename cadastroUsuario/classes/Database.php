<?php
// Definimos a classe Database que será responsável pela conexão com o banco de dados.
class Database {
    // Definimos as propriedades da classe com os detalhes da conexão.
    private $host = 'localhost'; // Endereço do servidor de banco de dados
    private $db_name = 'user_registration'; // Nome do banco de dados
    private $username = 'root'; // Nome de usuário do banco de dados
    private $password = ''; // Senha do banco de dados
    public $conn; // Propriedade que vai armazenar a conexão

    // Método que retorna a conexão com o banco de dados.
    public function getConnection() {
        $this->conn = null; // Inicializamos a conexão como null
        try {
            // Tentamos criar uma nova conexão PDO com os detalhes fornecidos.
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            // Definimos o charset da conexão como UTF-8.
            $this->conn->exec('set names utf8');
        } catch(PDOException $exception) {
            // Caso ocorra algum erro, exibimos a mensagem de erro.
            echo 'Connection error: ' . $exception->getMessage();
        }
        return $this->conn; // Retornamos a conexão
    }
}
?>
