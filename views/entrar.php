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
<body>
    <img src="../assets/image/Smalll.png" alt="logo" class="logologin">
    <div class="container">
    <h2>Login</h2>
    <form action="#" method="POST">
</select>


        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

    
        </label>
        <button type="submit">Entrar</button>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paiController = new PaiController();
    $paiController->login();
}
?>