<?php
// models/Crianca.php
require_once '../config/DbConfig.php';

class Crianca {
    private $db;

    // Construtor para inicializar a conexão com o banco de dados
    public function __construct() {
        $this->db = (new DbConfig())->getConnection();  // Conexão com o banco de dados
    }

    // Método para cadastrar uma nova criança
    public function create($nome, $idade, $sexo, $pai_id) {
        $query = "INSERT INTO criancas (nome, idade, sexo, pai_id) 
                  VALUES (?, ?, ?, ?)";  // Consulta SQL para inserir uma criança

        // Prepara a consulta
        $stmt = $this->db->prepare($query);
        // Faz o bind dos parâmetros
        $stmt->bind_param('sisi', $nome, $idade, $sexo, $pai_id); // Tipos: string, integer, string, integer

        // Executa a consulta e retorna o resultado
        return $stmt->execute();
    }

    // Método para obter uma criança pelo ID
    public function getById($id) {
        $query = "SELECT * FROM criancas WHERE id = ?";  // Consulta SQL para buscar uma criança pelo ID
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);  // Bind do ID da criança (inteiro)
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // Retorna os dados da criança ou null
    }

    // Método para obter todas as crianças de um determinado pai
    public function getByPaiId($pai_id) {
        $query = "SELECT * FROM criancas WHERE pai_id = ?";  // Consulta SQL para pegar todas as crianças de um pai
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $pai_id);  // Bind do ID do pai
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);  // Retorna todas as crianças associadas a esse pai
        } else {
            return [];  // Retorna um array vazio caso não encontre crianças
        }
    }
    
}
?>