<?php
session_start();

class ProtectedPai {
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public function estaLogado(){
        $logado = false;
        if (isset($_SESSION['user_id'])) {
            $logado = true;
        }
        return $logado;
    }

    public function getUserId() {
        return $_SESSION['user_id'];
    }

    public function getUserNome() {
        return $_SESSION['user_nome'];
    }

    public function getUserEmail() {
        return $_SESSION['user_email'];
    }

    
public function logout() {
    // Inicia a sessão
    session_start();
    
    // Limpa todas as variáveis de sessão
    $_SESSION = array();
    
    // Destroi a sessão
    session_destroy();
    
    // Redireciona para a página inicial
    header('Location: ../index.php');
    exit(); // Certifique-se de parar a execução do código após o redirecionamento
}

    // Outros métodos protegidos podem ser adicionados aqui
}
?>