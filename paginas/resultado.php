<?php
require_once '../dados.php';
require_once '../requires/header.php';


$idBuscado   = $_POST['id'] ?? null;
$nomeUsuario = $_POST['nome'] ?? 'Cliente';
$qtd         = (int)($_POST['quantidade'] ?? 0); //so pra garantir que vai ser int

//inicialização prévia para evitar problemas
$pacoteEncontrado = null;
$reservaConfirmada = false;
$erroEstoque = "";

// isso busca o pacote no array 
if ($idBuscado && isset($pacotes)) {
    foreach ($pacotes as $p) {
        if ($p['id'] == $idBuscado) {
            $pacoteEncontrado = $p;
            break;
        }
    }
}

//isso é para realmente alterar o arquivo dados.php
if ($pacoteEncontrado) {
    //verifica se a quantidade é válida em relação ao estoque
    if ($qtd > 0 && $qtd <= $pacoteEncontrado['disponivel']) {
        
        // se sim atualiza o array pacotes
        foreach ($pacotes as $indice => $p) {
            if ($p['id'] == $idBuscado) {
                $pacotes[$indice]['disponivel'] -= $qtd;
                // aqui atualiza a referencia local 
                $pacoteEncontrado['disponivel'] = $pacotes[$indice]['disponivel'];
                break;
            }
        }

        // Aqui sobreescreve o dados.php
        $conteudo = "<?php\n\n\$pacotes = " . var_export($pacotes, true) . ";\n?>";
        file_put_contents('../dados.php', $conteudo);
        
        $reservaConfirmada = true;
    } else {
        $erroEstoque = "Quantidade solicitada ($qtd) indisponível. Temos apenas {$pacoteEncontrado['disponivel']} vagas.";
    }
}
?>

<div class="container mt-5">
    <?php if ($pacoteEncontrado && $reservaConfirmada): ?>
        <!-- se deu certo -->
        <div class="card border-success shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Reserva Confirmada!</h4>
            </div>
            <div class="card-body">
                <h5>Parabéns, <?= htmlspecialchars($nomeUsuario) ?>!</h5>
                <p>Sua viagem para <strong><?= htmlspecialchars($pacoteEncontrado['nome']) ?></strong> está garantida.</p>
                <hr>
                <p><strong>Vagas reservadas:</strong> <?= $qtd ?></p>
                <p><strong>Valor Total:</strong> R$ <?= number_format($pacoteEncontrado['valor'] * $qtd, 2, ',', '.') ?></p>
                <p class="text-muted">Estoque atualizado: <?= $pacoteEncontrado['disponivel'] ?> vagas restantes.</p>
                <br>
                <a href="../index.php" class="btn btn-primary">Voltar ao Início</a>
            </div>
        </div>

    <?php elseif ($pacoteEncontrado && !$reservaConfirmada): ?>
        <!-- se deu erro  -->
        <div class="alert alert-warning shadow">
            <h4><i class="bi bi-exclamation-triangle"></i> Ops! Problema no estoque</h4>
            <p><?= $erroEstoque ?></p>
            <hr>
            <a href="javascript:history.back()" class="btn btn-warning">Voltar e Corrigir</a>
        </div>

    <?php else: ?>
        <!-- se nem encontrou o pacote  -->
        <div class="alert alert-danger shadow">
            <h4>Erro Fatal</h4>
            <p>O pacote selecionado não foi encontrado no nosso sistema.</p>
            <a href="../index.php" class="btn btn-danger">Voltar ao Início</a>
        </div>
    <?php endif; ?>
</div>

<?php 
require_once '../requires/footer.php'; 
?>