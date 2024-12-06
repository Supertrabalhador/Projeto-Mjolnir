<?php
// controllers/PaiController.php
require_once '../models/Pai.php';

class PaiController {
    private $paiModel;

    public function __construct() {
        $this->paiModel = new Pai();
    }

    // Método para cadastrar um novo pai
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome_responsavel'];
            $idade = $_POST['idade_responsavel'];
            $sexo = $_POST['sexo_responsavel'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $receber_recados = isset($_POST['receber_recados']) ? 1 : 0;

            $result = $this->paiModel->create($nome, $idade, $sexo, $email, $senha, $receber_recados);

            if ($result) {
                echo "Pai cadastrado com sucesso!";
                header('Location: ../index.php'); 
            } else {
                echo "Erro ao cadastrar pai.";
            }
        }
    }

    // Método para login
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
    
            $user = $this->paiModel->login($email, $senha);
    
            if ($user) {
                // Inicia a sessão
                session_start();
    
                // Armazena os dados do usuário na sessão
                $_SESSION['user_id'] = $user['id']; // Armazenar o ID do usuário
                $_SESSION['user_nome'] = $user['nome']; // Armazenar o nome do usuário
                $_SESSION['user_email'] = $user['email']; // Armazenar o email do usuário
    
                echo "Login bem-sucedido!";
                // Você pode redirecionar para uma página protegida aqui
                header('Location: ../index.php'); // Exemplo de redirecionamento
                exit(); // Certifique-se de parar a execução do código após o redirecionamento
            } else {
                echo "Falha no login.";
            }
        }
    }

    // Método para logout

    // Método para obter um pai pelo ID
    public function getById($id) {
        $pai = $this->paiModel->getById($id);
        if ($pai) {
            return $pai;
        } else {
            echo "Pai não encontrado.";
        }
    }

    // Método para verificar se o e-mail existe
    public function getByEmail($email) {
        $pai = $this->paiModel->getByEmail($email);
        if ($pai) {
            return $pai;
        } else {
            echo "Pai não encontrado.";
        }
    }
}
?>
