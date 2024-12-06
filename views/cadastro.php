<?php
require_once('header.php');
require_once('../controllers/PaiController.php');
require_once('../controllers/ProtectedPai.php');
$protected = new ProtectedPai();
$logado = $protected->estaLogado();

if($logado){
    header('Location: ../index.php');
    exit();
}
?>

<img src="../assets/image/Smalll.png" alt="logo" class="logologin">
<div class="containerr">
    <h2>Formulário de Contato</h2>
    <form action="#" method="POST">
        <label for="nome-resp">Nome do Responsável :</label>
        <input type="text" id="nome-resp" name="nome_responsavel" required>

        <label for="idade-resp">Idade do Responsável:</label>
        <input type="number" id="idade-resp" name="idade_responsavel" required>


        <label for="sexo-resp">Sexo do Responsável: </label>
        <select id="sexo-resp" name="sexo_responsavel" required>
            <option value="" disabled selected></option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
        </select>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <label for="senha-confirm">Confirmar senha:</label>
        <input type="password" id="senha-confirm" name="senha_confirm" required> 

        <label> Quero receber recados por Email <input type="checkbox" name="receber_recados" value="sim"></label>

        <button type="submit">Enviar</button>
    </form>
</div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paiController = new PaiController();
    $paiController->create();
}
?>
