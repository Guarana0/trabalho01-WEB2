<?php
require '../dados.php';
require '../requires/header.php';

#id armazena o id do pacote recebido via GET
$id = $_GET['id'] ?? null;

$pacote = null;


#loop para percorrer o array pacotes, ate achar o pacote como o id correspondente ao pacote desejado--> 
foreach ($pacotes as $p) {
  if ($p['id'] == $id) {
    $pacote = $p;
    break;
  }
}

if (!$pacote) {
//por enquanto o footer ainda esta quebrado nessa parte (vou corrigir depois)
  echo "<div class='container mt-5'><h3>Pacote não encontrado</h3></div>";
  require '../requires/footer.php';
 exit;
}
?>

<div class="container mt-5">

  <div class="row">

    <!-- imagem de acordo com o pacote selecionado-->
    <div class="col-md-6">
      <img src="../imagens/<?= htmlspecialchars($pacote['imagem']) ?>" 
           class="img-fluid rounded">
    </div>

    <!-- informacoes do pacote ,dinamica de acordo com o pacote selecionado-->
    <div class="col-md-6">

      <h2><?= htmlspecialchars($pacote['nome']) ?></h2>

      <p><?= htmlspecialchars($pacote['descricao']) ?></p>

      <h4 class="text-success">
        R$ <?= number_format($pacote['valor'], 2, ',', '.') ?>
      </h4>

      <!-- disponibilidade -->
      <?php if ($pacote['disponivel'] > 0): ?>
        <!--usei o badge bg-sucess para o icone ficar verde caso esteja disponivel-->
        <span class="badge bg-success">Disponível</span>
      <?php else: ?>
        <!--e o danger para ficar vermelho caso esteja esgotado-->
        <span class="badge bg-danger">Esgotado</span>
      <?php endif; ?>

      <hr>

      <!-- Formulario que tera o seu resultadol exibido em resultado.php -->
      <form action="resultado.php" method="POST">

        <input type="hidden" name="id" value="<?= $pacote['id'] ?>">
<!--todos os itens do foprmulario eu coloquei como required ja que e impossivel comtratar um pacote sem fornece-los-->
        <div class="mb-3">
          <label>Nome</label>
          <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Quantidade</label>
          <input type="number" name="quantidade" class="form-control" min="1" required>
        </div>
<!--caso nao tenha pacote disponivel ou seja o numero de pacotes
 diponiveis == 0 o botão de reservar fica desabilitado-->
        <button class="btn btn-success w-100"
          <?= $pacote['disponivel'] == 0 ? 'disabled' : '' ?>>
          Reservar
        </button>

      </form>

    </div>

  </div>

</div>

<?php require '../requires/footer.php'; ?>