<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho web Agência de Turismo</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Degradê personalizado -->
    <style>
      .degrade-navbar {
        background: linear-gradient(90deg, #100124, #8223fd);
      }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark degrade-navbar py-4 shadow">
  <div class="container">
    
    <!-- Logo e o nome da empresa (vamos decidir ainda) -->
    <a class="navbar-brand fs-2 fw-bold" href="index.php">
       Sem nome
    </a>

    <!-- Div pai com todos os links e botaoes da nav dentro-->
    <div class="collapse navbar-collapse" id="menu">
      
      <!-- Links da nav bar -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5">
        
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Início</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Destinos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Pacotes</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Contato</a>
        </li>
<!--vamos troca-los futuramente mas serve de exemplo-->
      </ul>
    

      <!-- Botão para reservar um pacote -->
      <a href="#" class="btn btn-light ms-lg-3 fw-semibold px-4 py-2">
        Reservar agora
      </a>

    </div>
  </div>
</nav>

</body>
</html>