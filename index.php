<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quem sou eu</title>
  <link rel = "stylesheet" href = "styles/styles.css"> 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <?php
  include('controllers/ProtectedPai.php');
  $protected = new ProtectedPai();
  $logado = $protected->estaLogado();
  
  ?>
  <!-- Código da Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
  <a class="navbar-brand" href="/mjolnir">Small Learning</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php if ($logado): ?>
      <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/views/cadastrar_filhos.php') echo 'active'; ?>">
      <a class="nav-link" href="views/cadastrarCrianca.php">Cadastrar Filhos</a>
      </li>
      <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/views/listaCriancas.php') echo 'active'; ?>">
      <a class="nav-link" href="views/listaCriancas.php">Lista de Filhos</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="controllers/logout.php">Logout</a>
      </li>
    <?php else: ?>
      <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/views/cadastro.php') echo 'active'; ?>">
      <a class="nav-link" href="views/cadastro.php">Cadastro</a>
      </li>
      <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/views/entrar.php') echo 'active'; ?>">
      <a class="nav-link" href="views/entrar.php">Entrar</a>
      </li>
    <?php endif; ?>
    </ul>
  </div>
  </nav>

  <h1 class="bebas-neue-regular"><span class="vodytext">Small learning</span></h1>
  <img src="assets/image/Smalll.png" class="ajustarfoto" alt="sam-face">
  <h1>Ensine inglês ao seu filho de maneira divertida com jogos</h1>
</body>
</html>