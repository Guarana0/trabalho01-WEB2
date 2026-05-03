<?php
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

// Agora verificamos se há erro ou dados vindo da URL (caso o resultado.php nos devolva por erro)
$erroData = $_GET['erro'] ?? "";
$dados = $_GET ?? []; 

//Agora que a lógica de cabeçalho terminou, podemos carregar o visual ---
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
          <?= htmlspecialchars($erroData) ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="resultado.php">

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