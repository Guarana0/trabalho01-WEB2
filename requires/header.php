<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agência de Turismo - Cefetur</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Degradê personalizado -->
    <style>
      .degrade-navbar {
        background: linear-gradient(90deg, #67a8fd, #0e0242);
      }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark degrade-navbar py-2 shadow">
  <div class="container">
    
    <!-- Logo e o nome da empresa agora se chama CEFETUR -->
   <a class="navbar-brand d-flex align-items-center fw-bold" href="/trabalho01-WEB2/index.php">
  <img src="/trabalho01-WEB2/img/cefet.png" alt="Cefetur" width="90" height="90" class="me-3">

  <span style="font-size: 32px; letter-spacing: 1px; color: #f8f9fa;">
    CEFETUR
  </span>
</a>

    <!-- Div pai com todos os links e botaoes da nav dentro-->
    <div class="collapse navbar-collapse" id="menu">
      
      <!-- Links da nav bar -->
      <!-- Links da nav bar -->
<ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5">
  
  <li class="nav-item">
    <a class="nav-link active" href="/trabalho01-WEB2/index.php">Início</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/trabalho01-WEB2/pacotes.php">Pacotes</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/trabalho01-WEB2/contato.php">Contato</a>
  </li>

</ul>
    

      <!-- Botão para reservar um pacote -->
      <a href="./pacotes.php" class="btn btn-light ms-lg-3 fw-semibold px-4 py-2">
        Reservar agora
      </a>

    </div>
  </div>
</nav>


</body>
</html>