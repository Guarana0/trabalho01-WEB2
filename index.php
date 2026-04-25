<?php require 'requires/header.php'; ?>

<div class="container-fluid mt-4 style="max-width: 1200px;">

    <div id="carouselSimples" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="imagens/Salvador_img.jpg" class="d-block w-100" style="height: 450px; object-fit: cover;">
            </div>

            <div class="carousel-item">
                <img src="imagens/Rio_img.jpg" class="d-block w-100" style="height: 450px; object-fit: cover;">
            </div>

            <div class="carousel-item">
                <img src="imagens/Amazonas_img.jpg" class="d-block w-100" style="height: 450px; object-fit: cover;">
            </div>

            <div class="carousel-item">
                <img src="imagens/Gramado_img.jpg" class="d-block w-100" style="height: 450px; object-fit: cover;">
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselSimples" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselSimples" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>

</div>

<div class="container mt-5">

  <h2 class="text-center mb-4">Pacotes de Viagem</h2>

  <div class="row g-4">

    <!-- Card 1 Salvador Bahia-->
    <div class="col-md-4">
      <div class="card h-100 shadow">
        <img src="imagens/Salvador_img.jpg" class="card-img-top" style="height: 200px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title">Salvador</h5>
          <p class="card-text">Aproveite praias incríveis e cultura única na Bahia.</p>
          <!--link com a navegacao para a pagina de detalhes do pacote-->
          <a href="paginas/detalhes.php?id=1" class="btn btn-primary">Ver pacote</a>
        </div>
      </div>
    </div>

    <!-- Card 2 RJ  -->
    <div class="col-md-4">
      <div class="card h-100 shadow">
        <img src="imagens/Rio_img.jpg" class="card-img-top" style="height: 200px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title">Rio de Janeiro</h5>
          <p class="card-text">Conheça o Cristo Redentor e as praias famosas.</p>
          <!--link com a navegacao para a pagina de detalhes do pacote-->
          <a href="paginas/detalhes.php?id=2" class="btn btn-primary">Ver pacote</a>
        </div>
      </div>
    </div>

    <!-- Card 3 Manaus - Amazonas  -->
    <div class="col-md-4">
      <div class="card h-100 shadow">
        <img src="imagens/Amazonas_img.jpg" class="card-img-top" style="height: 200px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title">Amazonas</h5>
          <p class="card-text">Explore a maior floresta tropical do mundo.</p>
          <!--link com a navegacao para a pagina de detalhes do pacote-->
          <a href="paginas/detalhes.php?id=3" class="btn btn-primary">Ver pacote</a>
        </div>
      </div>
    </div>

    <!-- Card 4 Gramado RS  -->
    <div class="col-md-4">
      <div class="card h-100 shadow">
        <img src="imagens/Gramado_img.jpg" class="card-img-top" style="height: 200px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title">Gramado</h5>
          <p class="card-text">Clima europeu e experiências incríveis no sul.</p>
          <!--link com a navegacao para a pagina de detalhes do pacote-->
          <a href="paginas/detalhes.php?id=4" class="btn btn-primary">Ver pacote</a>
        </div>
      </div>
    </div>

  </div>

</div>

<?php require 'requires/footer.php'; ?>