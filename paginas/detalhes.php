<?php
session_start(); // Inicia a sessão para transportar os dados do POST
require '../dados.php';

// --- A lógica de redirecionamento e dados deve vir ANTES do header.php ---

$id = $_GET['id'] ?? null;

$pacote = null;

foreach ($pacotes as $p) {
  if ($p['id'] == $id) {
    $pacote = $p;
    break;
  }
}

// VARIÁVEIS DE CONTROLE
$erroData = "";
$dados = $_POST ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $inicio = $_POST['data_inicio'] ?? '';
  $fim = $_POST['data_fim'] ?? '';

  #esse if é composto por 2 partes primeiro ele garante que o inicio e o fim existem
  #Depois ele verifica se a data inicial é maior q a final 
  if ($inicio && $fim && $inicio > $fim) {
    $erroData = "A data de início deve ser antes da data de término.";
  } else {
    #se estiver tudo ok e a datade inicio for menor que a data do fim o formulario direciona o usuario
    #para a pagina de resultado 

    // Salvamos os dados na sessão para que resultado.php possa ler
    $_SESSION['dados_reserva'] = $_POST;

    //header() é uma função do PHP que envia instruções (cabeçalhos HTTP) para o navegador.
    //E um redirecionamento automatico 
    header("Location: resultado.php");

    //Evita que o resto da página continue executando
    exit;
  }
}

// --- Agora que a lógica de cabeçalho terminou, podemos carregar o visual ---
require '../requires/header.php';

if (!$pacote) {
  echo "<div class='container mt-5'><h3>Pacote não encontrado</h3></div>";
  require '../requires/footer.php';
  exit;
}
?>

<div class="container mt-5">

  <div class="row">

    <!-- IMAGEM -->
    <div class="col-md-6">
      <img src="../img/<?= htmlspecialchars($pacote['imagem']) ?>" 
           class="img-fluid rounded">
    </div>

    <!-- INFO -->
    <div class="col-md-6">

      <h2><?= htmlspecialchars($pacote['nome']) ?></h2>

      <p><?= htmlspecialchars($pacote['descricao']) ?></p>

      <h4 class="text-success">
        R$ <?= number_format($pacote['valor'], 2, ',', '.') ?>
      </h4>

      <!-- disponibilidade -->
      <?php if ($pacote['disponivel'] > 0): ?>
        <span class="badge bg-success">Disponível</span>
      <?php else: ?>
        <span class="badge bg-danger">Esgotado</span>
      <?php endif; ?>

      <hr>

      <!-- Erro na data -->
      <?php if (!empty($erroData)): ?>
        <div class="alert alert-danger">
          <?= $erroData ?>
        </div>
      <?php endif; ?>

      <!-- FORM -->
      <form method="POST">

        <input type="hidden" name="id" value="<?= $pacote['id'] ?>">

        <div class="mb-3">
          <label>Nome</label>
          <input type="text" name="nome" class="form-control" required
            value="<?= htmlspecialchars($dados['nome'] ?? '') ?>">
        </div>

        <div class="mb-3">
          <label>Quantidade</label>
          <input type="number" name="quantidade" class="form-control" min="1" required
            value="<?= htmlspecialchars($dados['quantidade'] ?? '') ?>">
        </div>

        <!-- DATA INICIO -->
        <div class="mb-3">
          <label>Data de início</label>
          <input type="date" name="data_inicio" class="form-control" required
            value="<?= htmlspecialchars($dados['data_inicio'] ?? '') ?>">
        </div>

        <!-- DATA FIM -->
        <div class="mb-3">
          <label>Data de término</label>
          <input type="date" name="data_fim" class="form-control" required
            value="<?= htmlspecialchars($dados['data_fim'] ?? '') ?>">
        </div>

        <!-- OBSERVAÇÃO -->
        <div class="mb-3">
          <label>Observações</label>
          <textarea name="observacoes" class="form-control" rows="3"><?= htmlspecialchars($dados['observacoes'] ?? '') ?></textarea>
        </div>

        <button type="submit" class="btn btn-success w-100" 
          <?= $pacote['disponivel'] == 0 ? 'disabled' : '' ?>>
          Reservar
        </button>

      </form>

    </div>

  </div>

</div>

<?php require '../requires/footer.php'; ?>