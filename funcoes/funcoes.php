<?php
//essa função serve para desenhar a página inicial.
function mostrarPacote($pacote) {
    ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <img src="imagens/<?= $pacote['imagem'] ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
            
            <div class="card-body d-flex flex-column"> <h5 class="card-title" style="min-height: 50px;"><?= $pacote['nome'] ?></h5>
                
                <p class="card-text">Valor: R$ <?= number_format($pacote['valor'], 2, ',', '.') ?></p>
                
                <div style="min-height: 40px;"> 
                    <?php if ($pacote['disponivel'] > 0): //validacao de disponibilidade ?> 
                        <span class="badge bg-success">Disponível: <?= $pacote['disponivel'] ?> vagas</span>
                    <?php else: ?>
                        <span class="badge bg-danger">Esgotado</span>
                    <?php endif; ?>
                </div>

                <div class="mt-auto">
                    <?php if ($pacote['disponivel'] > 0): ?>
                        <a href="paginas/detalhes.php?id=<?= $pacote['id'] ?>" class="btn btn-primary w-100">Ver Detalhes</a>
                    <?php else: ?>
                        <button class="btn btn-secondary w-100" disabled>Indisponível</button>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
    <?php
}