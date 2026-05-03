<?php
require_once 'funcoes/funcoes.php'; 
require_once 'dados.php'; 

require 'requires/header.php';

?>
<!--Carrosel peguei um modelo pronto do proprio bootstrap e apenas
 personalizei algumas caracteristicas que eu julqguei necessario-->

<div class="container-fluid mt-4">

    <div style="max-width: 1300px; margin: auto;">

        <div id="carouselSimples" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">

            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="img/Salvador_img.jpg" 
                         class="d-block w-100" 
                         style="height: 500px; object-fit: cover; border-radius: 10px;">
                </div>

                <div class="carousel-item">
                    <img src="img/Rio_img.jpg" 
                         class="d-block w-100" 
                         style="height: 500px; object-fit: cover; border-radius: 10px;">
                </div>

                <div class="carousel-item">
                    <img src="img/Amazonas_img.jpg" 
                         class="d-block w-100" 
                         style="height: 500px; object-fit: cover; border-radius: 10px;">
                </div>

                <div class="carousel-item">
                    <img src="img/Gramado_img.jpg" 
                         class="d-block w-100" 
                         style="height: 500px; object-fit: cover; border-radius: 10px;">
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

</div>
</div>


<!-- Introdução da empresa !-->
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6"> 
            <img src="img/PessoasFazendoTurismo.jpeg" class="d-block mx-lg-auto img-fluid rounded" alt="Mulher apreciando uma vista" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Transforme sua viagem com a nossa agência</h1>
            <p class="lead">Sua jornada começa aqui. Somos uma agência de viagens criada
                 para transformar sonhos em experiências inesquecíveis, oferecendo destinos incríveis, preços acessíveis 
                 e um atendimento de qualidade. <br>
     Do litoral ao interior, da aventura ao descanso, a CEFETUR conecta você aos 
melhores lugares do Brasil com praticidade, segurança e conforto.</p>
        </div>
    </div>
</div>

<!-- Seção de Motivos para Escolher -->
<div class="container py-5 bg-light">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold text-body-emphasis">Por que escolher a CEFETUR?</h2>
                <p class="lead text-muted">Veja os motivos que nos tornam a melhor agência de turismo</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Motivo 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="text-center p-4 rounded">
                        <div class="mb-3">
                            <i class="bi bi-shield-check" style="font-size: 3rem; color: #67a8fd;"></i>
                        </div>
                        <h5 class="fw-bold mb-2">100% Seguro</h5>
                        <p class="text-muted">Suas viagens protegidas com as melhores práticas de segurança e atendimento profissional garantido.</p>
                    </div>
                </div>

                <!-- Motivo 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="text-center p-4 rounded">
                        <div class="mb-3">
                            <i class="bi bi-cash-coin" style="font-size: 3rem; color: #67a8fd;"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Melhor Preço</h5>
                        <p class="text-muted">Pacotes com o melhor custo-benefício do mercado. Compare e comprove nossas ofertas incomparáveis.</p>
                    </div>
                </div>

                <!-- Motivo 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="text-center p-4 rounded">
                        <div class="mb-3">
                            <i class="bi bi-headset" style="font-size: 3rem; color: #67a8fd;"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Atendimento 24/7</h5>
                        <p class="text-muted">Nossa equipe está sempre disponível para esclarecer dúvidas e resolver problemas a qualquer hora.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Seção de Avaliações -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="display-6 fw-bold text-body-emphasis">O que nossos clientes dizem</h2>
    </div>

    <div class="row g-4 justify-content-center">
        <!-- Avaliação 1 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-lg border-0 text-center p-4">
                <img src="img/mulherAvaliacao.jpg" alt="Cliente 1" class="rounded-circle mx-auto mb-3" width="130" height="130">
                <h5 class="card-title fw-bold">Maria Silva</h5>
                <p class="card-text text-muted">"Experiência incrível! A agência cuidou de cada detalhe da minha viagem. Voltarei com certeza!"</p>
            </div>
        </div>

        <!-- Avaliação 2 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-lg border-0 text-center p-4">
                <img src="img/homemAvaliacao2.jpg" alt="Cliente 2" class="rounded-circle mx-auto mb-3" width="130" height="130">
                <h5 class="card-title fw-bold">João Santos</h5>
                <p class="card-text text-muted">"Profissionais muito atenciosos. Minha família inteira aproveitou bastante a viagem sem preocupações."</p>
            </div>
        </div>

        <!-- Avaliação 3 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-lg border-0 text-center p-4">
                <img src="img/mulherAvaliacao2r.jpg" alt="Cliente 3" class="rounded-circle mx-auto mb-3" width="130" height="130">
                <h5 class="card-title fw-bold">Ana Costa</h5>
                <p class="card-text text-muted">"Melhor agência que já usei! Pacotes com ótimo custo-benefício e atendimento de primeira qualidade."</p>
            </div>
        </div>
    </div>
</div>

<!-- Seção de Pacotes Destacados -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="display-6 fw-bold text-body-emphasis">Nossos Pacotes em Destaque</h2>
        <p class="lead text-muted">Escolha um de nossos pacotes e comece sua aventura</p>
    </div>
    
    <div class="row g-4 justify-content-center">
        <?php foreach ($pacotes as $pacote) {
            // Condição: só mostra se tem disponibilidade
            if ($pacote['disponivel'] > 0) {
        ?>
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-lg border-0">
                <img src="img/<?= htmlspecialchars($pacote['imagem']) ?>" alt="pacote" class="card-img-top" height="250" style="object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold"><?= htmlspecialchars($pacote['nome']) ?></h5>
                    <p class="card-text text-muted flex-grow-1"><?= htmlspecialchars($pacote['descricao']) ?></p>
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="badge bg-success">Disponível</span>
                        <span class="fw-bold text-success">R$ <?= number_format($pacote['valor'], 2, ',', '.') ?></span>
                    </div>

                    <a href="paginas/detalhes.php?id=<?= $pacote['id'] ?>" class="btn btn-primary mt-3 w-100">Ver Detalhes</a>
                </div>
            </div>
        </div>
        <?php 
            }
        } 
        ?>
    </div>

    <!-- Botão Ver Mais Pacotes -->
    <div class="text-center mt-5">
        <a href="./pacotes.php" class="btn btn-outline-primary btn-lg px-5 py-3">
            <i class="bi bi-arrow-right me-2"></i>Ver Todos os Pacotes
        </a>
    </div>
</div>

<?php require 'requires/footer.php'; ?>