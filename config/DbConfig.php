<?php
class DbConfig {
    // Atributos privados para configuração do banco de dados
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '1234';
    private $_database = 'thor';
    public $connection;

    // Método construtor para conectar ao banco de dados
    public function __construct() {
        // Verifica se a conexão ainda não foi estabelecida
        if (!$this->connection) {
            // Tenta estabelecer a conexão com o banco de dados
            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);

            // Verifica se houve erro ao tentar conectar
            if ($this->connection->connect_error) {
                die('Erro de conexão: ' . $this->connection->connect_error); // Exibe o erro e encerra o script
            }
        }
    }

    // Método para obter a conexão
    public function getConnection() {
        return $this->connection;
    }
}
