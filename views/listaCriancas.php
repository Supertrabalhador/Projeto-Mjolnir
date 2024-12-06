<?php
require_once('header.php');
require_once('../controllers/CriancaController.php');
require_once('../controllers/ProtectedPai.php');
$protected = new ProtectedPai();
$logado = $protected->estaLogado();
$pai_id = $protected->getUserId();  // Recuperando o ID do pai a partir da sessão

// Chama o método para pegar as crianças associadas ao pai
$criancaController = new CriancaController();
$criancas = $criancaController->getByPaiId($pai_id);

// Verifica se foi retornado um array com crianças
if (!empty($criancas)) {
    echo "<div class='container'>";
    echo "<h2>Crianças Cadastradas</h2>";
    echo "<div class='criancas-list'>";
    
    foreach ($criancas as $crianca) {
        echo "<div class='card'>";
        echo "<img src='../assets/image/Corinthians.jpeg' alt='Foto da criança' class='card-img'>";
        echo "<div class='card-body'>";
        echo "<h3>" . htmlspecialchars($crianca['nome']) . "</h3>";
        echo "<p>Idade: " . $crianca['idade'] . " anos</p>";
        echo "<p>Sexo: " . $crianca['sexo'] . "</p>";
        echo "</div>";
        echo "</div>";
    }
    
    echo "</div>";
    echo "</div>";
} else {
    // Caso não haja crianças cadastradas para o pai
    echo "<p>Nenhuma criança encontrada para este pai.</p>";
}
?>
</body>
</html>
