<?php
require_once '../dados.php';
require_once '../requires/header.php';

// Recuperamos os dados diretamente do POST (vindo do formulário em detalhes.php)
$dadosSessao = $_POST ?? []; 

$idBuscado   = $dadosSessao['id'] ?? null;
$nomeUsuario = $dadosSessao['nome'] ?? 'Cliente';
$qtd         = (int)($dadosSessao['quantidade'] ?? 0); //so pra garantir que vai ser int

// NOVOS CAMPOS
$dataInicio = $dadosSessao['data_inicio'] ?? '';
$dataFim = $dadosSessao['data_fim'] ?? '';
$observacoes = $dadosSessao['observacoes'] ?? '';

//inicialização prévia para evitar problemas
$pacoteEncontrado = null;
$reservaConfirmada = false;
$erroEstoque = "";
$taxaExtra = 0;   
$valorTotal = 0;  
$diferencaDias = 0;

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
    // ve o estoque
    if ($qtd > 0 && $qtd <= $pacoteEncontrado['disponivel']) {

        $dataValida = true; // assume que a data eh valida
        $valorBase = $pacoteEncontrado['valor'] * $qtd;
        
        // calcula taxas
        if (!empty($dataInicio) && !empty($dataFim)) {
            $d1 = new DateTime($dataInicio);
            $d2 = new DateTime($dataFim);

            if ($d1 > $d2) {
                $erroEstoque = "A data de término não pode ser anterior à data de início.";
                $dataValida = false; 
            } else {
                $intervalo = $d1->diff($d2);
                $diferencaDias = $intervalo->days;

                if ($diferencaDias > 7) {
                    $diasExtras = $diferencaDias - 7;
                    $taxaExtra = $diasExtras * 100;
                }
            }
        }

        $valorTotal = $valorBase + $taxaExtra;

        //so altera dados.php e confirma se a data for válida
        if ($dataValida) {
            foreach ($pacotes as $indice => $p) {
                if ($p['id'] == $idBuscado) {
                    $pacotes[$indice]['disponivel'] -= $qtd;
                    $pacoteEncontrado['disponivel'] = $pacotes[$indice]['disponivel'];
                    break;
                }
            }

            // sobreescrita dados.php
            $conteudo = "<?php\n\n\$pacotes = " . var_export($pacotes, true) . ";\n?>";
            file_put_contents('../dados.php', $conteudo);
            
            $reservaConfirmada = true;
            
            // Evita reservas duplicadas
            // unset($_SESSION['dados_reserva']); // Removido: Não é mais necessário com POST
        } else {
            $reservaConfirmada = false; // caso a data falhar, nao mostra sucesso
        }

    } else {
        $erroEstoque = "Quantidade solicitada ($qtd) indisponível. Temos apenas {$pacoteEncontrado['disponivel']} vagas.";
        $reservaConfirmada = false;
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
                <p><strong>Valor Total:</strong> R$ <?= number_format($valorTotal, 2, ',', '.') ?></p>

                <?php if ($taxaExtra > 0): ?>
                    <p class="small text-danger">*Inclui taxa extra de R$ <?= number_format($taxaExtra, 2, ',', '.') ?> por estadia longa</p>
                <?php endif; ?>

                <!--aqui eu coloquei as informacoes da data de inicio e da de termino -->
                <p><strong>Data de início:</strong> <?= !empty($dataInicio) ? date('d/m/Y', strtotime($dataInicio)) : 'Não informada' ?></p>
                <p><strong>Data de término:</strong> <?= !empty($dataFim) ? date('d/m/Y', strtotime($dataFim)) : 'Não informada' ?></p>

                <?php if (!empty($observacoes)): ?>
                    <p><strong>Observações:</strong><br>
                    <?= nl2br(htmlspecialchars($observacoes)) ?></p>
                <?php endif; ?>

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
          <a href="<?= $_SERVER['HTTP_REFERER'] ?? 'index.php' ?>" class="btn btn-warning">
    Voltar e Corrigir
</a>
        </div>

    <?php else: ?>
        <!-- se nem encontrou o pacote  -->
        <div class="alert alert-danger shadow">
            <h4>Erro Fatal</h4>
            <p>O pacote selecionado não foi encontrado no nosso sistema ou o formulário não foi enviado corretamente.</p>
            <a href="../index.php" class="btn btn-danger">Voltar ao Início</a>
        </div>
    <?php endif; ?>
</div>

<?php 
require_once '../requires/footer.php'; 
?>