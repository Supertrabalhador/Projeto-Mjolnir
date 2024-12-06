<?php
require_once('header.php');
require_once('../controllers/CriancaController.php');
require_once('../controllers/ProtectedPai.php');
$protected = new ProtectedPai();
$logado = $protected->estaLogado();
$pai_id = $protected->getUserId()
?>

<img src="../assets/image/Smalll.png" alt="logo" class="logologin">
<div class="containerr">
    <h2>Formulário de Contato</h2>
    <form action="#" method="POST">
        <label for="nome-resp">Nome da Criança :</label>
        <input type="text" id="nome-resp" name="nome_crianca" required>

        <label for="idade-resp">Idade da Criança:</label>
        <input type="number" id="idade-resp" name="idade_crianca" required>


        <label for="sexo-resp">Sexo da Criança: </label>
        <select id="sexo-resp" name="sexo_crianca" required>
            <option value="" disabled selected></option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
        </select>

        <button type="submit">Enviar</button>
    </form>
</div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $criancaController = new CriancaController();
    $criancaController->create($pai_id);
}
?>
