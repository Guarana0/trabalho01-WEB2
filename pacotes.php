<?php
require_once 'funcoes/funcoes.php'; 
require_once 'dados.php'; 
require 'requires/header.php';
?>

<div class="container mt-4 text-center">
    <h2 class="mb-4">Filtrar por categoria</h2>
    <a href="pacotes.php" class="btn btn-outline-dark m-1">Todos</a>
    <a href="pacotes.php?categoria=praia" class="btn btn-outline-primary m-1">Praia</a>
    <a href="pacotes.php?categoria=cidade" class="btn btn-outline-primary m-1">Cidade</a>
    <a href="pacotes.php?categoria=natureza" class="btn btn-outline-primary m-1">Natureza</a>
</div>

<div class="container mt-5">
    <h2 class="text-center mb-4">Pacotes de Viagem</h2>
    
    <?php
    $filtro = $_GET['categoria'] ?? 'todos';
    $contador = 0;

    //lógica do contador
    $pacotesFiltrados = [];
    foreach ($pacotes as $pacote) {
        $categoriasDoPacote = (array) $pacote['categoria'];
        if ($filtro === 'todos' || in_array($filtro, $categoriasDoPacote)) {
            $pacotesFiltrados[] = $pacote;
        }
    }
    $total = count($pacotesFiltrados);
    ?>

    <!-- exibição do contador -->
    <p class="text-center text-muted mb-5">
        Exibindo <strong><?php echo $total; ?></strong> <?php echo ($total == 1) ? 'pacote encontrado' : 'pacotes encontrados'; ?>.
    </p>

    <div class="row g-4">
        <?php
        if ($total > 0) {
            foreach ($pacotesFiltrados as $pacote) {
                mostrarPacote($pacote); 
            }
        } else {
            echo "<p class='text-center'>Nenhum pacote encontrado para esta categoria.</p>";
        }
        ?>
    </div>
</div>

<?php
require 'requires/footer.php';
?>