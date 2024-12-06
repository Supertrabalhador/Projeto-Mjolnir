<?php
// controllers/CriancaController.php
require_once '../models/Crianca.php';

class CriancaController {
    private $model;

    // Construtor para inicializar o modelo Crianca
    public function __construct() {
        $this->model = new Crianca();
    }

    // Método para cadastrar uma nova criança
    public function create($pai_id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome_crianca'];
            $idade = $_POST['idade_crianca'];
            $sexo = $_POST['sexo_crianca'];
            $result = $this->model->create($nome, $idade, $sexo, $pai_id);

            if ($result) {
                echo "Criança cadastrada com sucesso!";
            } else {
                echo "Erro ao cadastrar criança.";
            }
        }
    }

    // Método para obter uma criança pelo ID
    public function getById($id) {
        $crianca = $this->model->getById($id);

        if ($crianca) {
            echo json_encode($crianca);
        } else {
            echo "Criança não encontrada.";
        }
    }

    // Método para obter todas as crianças de um determinado pai
    public function getByPaiId($pai_id) {
        $criancas = $this->model->getByPaiId($pai_id);
    
        // Verifica se a consulta retornou um array de crianças
        if (!empty($criancas)) {
            return $criancas;  // Retorna o array com as crianças
        } else {
            return [];  // Retorna um array vazio caso não encontre crianças
        }
    }
    
}

// Exemplo de uso do controller
?>