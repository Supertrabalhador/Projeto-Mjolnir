<?php
// models/User.php
require_once '../config/DbConfig.php';

class Pai {
    private $db;

    public function __construct() {
        // Cria a conexão com o banco usando o DbConfig
        $this->db = (new DbConfig())->getConnection();
    }

       // Método para cadastrar um novo pai
       public function create($nome, $idade, $sexo, $email, $senha, $receber_recados) {
        $query = "INSERT INTO pais (nome, idade, sexo, email, senha, receber_recados) 
                  VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($query);
        $hashed_password = password_hash($senha, PASSWORD_BCRYPT);
        $stmt->bind_param('sissss', $nome, $idade, $sexo, $email, $hashed_password, $receber_recados);

        return $stmt->execute();
    }

    // Método para verificar se o e-mail existe
    public function getByEmail($email) {
        $query = "SELECT * FROM pais WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // Retorna o pai ou null
    }

    // Método para obter um pai pelo ID
    public function getById($id) {
        $query = "SELECT * FROM pais WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param(':id', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Método para login
    public function login($email, $senha) {
        $query = "SELECT * FROM pais WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($senha, $user['senha'])) {
            return $user; // Login bem-sucedido, retorna os dados do usuário
        } else {
            return false; // Falha no login
        }
    }
}
?>
