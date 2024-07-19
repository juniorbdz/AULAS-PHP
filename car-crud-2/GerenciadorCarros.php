<?php
// Classe GerenciadorCarros para gerenciar o CRUD dos carros
class GerenciadorCarros {
    private $carros = [];
    private $arquivo = 'dados.json';

    // Construtor da classe, carrega os dados do arquivo JSON
    public function __construct() {
        if (file_exists($this->arquivo)) {
            $dados = file_get_contents($this->arquivo);
            $this->carros = json_decode($dados, true) ?? [];
        }
    }

    // Adiciona um novo carro e salva no arquivo JSON
    public function adicionarCarro($carro) {
        $this->carros[] = [
            'marca' => $carro->getMarca(),
            'modelo' => $carro->getModelo(),
            'ano' => $carro->getAno(),
            'cor' => $carro->getCor()
        ];
        $this->salvarDados();
    }

    // Remove carros selecionados e salva no arquivo JSON
    public function deletarCarros($indices) {
        foreach ($indices as $indice) {
            if (isset($this->carros[$indice])) {
                unset($this->carros[$indice]);
            }
        }
        $this->carros = array_values($this->carros); // Reindexar o array
        $this->salvarDados();
    }

    // Retorna a lista de carros
    public function getCarros() {
        return $this->carros;
    }

    // Salva os dados no arquivo JSON
    private function salvarDados() {
        file_put_contents($this->arquivo, json_encode($this->carros, JSON_PRETTY_PRINT));
    }
}
?>
