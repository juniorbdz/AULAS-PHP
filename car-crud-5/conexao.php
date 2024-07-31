<?php
/**
 * Classe Conexao
 *
 * Esta classe é responsável por estabelecer a conexão com o banco de dados usando PDO.
 */

class Conexao {
    /**
     * @var string $host Endereço do servidor de banco de dados.
     */
    private $host = 'localhost';

    /**
     * @var string $dbname Nome do banco de dados.
     */
    private $dbname = 'carros_db2';

    /**
     * @var string $usuario Nome do usuário para a conexão com o banco de dados.
     */
    private $usuario = 'root';

    /**
     * @var string $senha Senha para a conexão com o banco de dados.
     */
    private $senha = '';

    /**
     * Método para conectar ao banco de dados.
     *
     * Este método cria uma nova instância da classe PDO para estabelecer a conexão
     * com o banco de dados e define o modo de erro do PDO para exceções.
     *
     * @return PDO|null Retorna a instância da conexão PDO em caso de sucesso, ou null em caso de falha.
     */
    public function conectar() {
        try {
            // Cria uma nova instância de PDO para a conexão com o banco de dados
            $conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->usuario, $this->senha);
            
            // Define o modo de erro do PDO para exceções
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Retorna a conexão
            return $conexao;
        } catch (PDOException $e) {
            // Em caso de erro, exibe a mensagem de erro
            echo 'Erro: ' . $e->getMessage();
            return null;
        }
    }
}
?>
