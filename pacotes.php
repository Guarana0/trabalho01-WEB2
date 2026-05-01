<?php
require_once 'funcoes/funcoes.php'; 
require_once 'dados.php'; 

require 'requires/header.php';


?>

<div class="container mt-4 text-center">

  <h2 class="mb-4">Filtrar por categoria</h2>

  <a href="index.php" class="btn btn-outline-dark m-1">Todos</a>
  <a href="index.php?categoria=praia" class="btn btn-outline-primary m-1">Praia</a>
  <a href="index.php?categoria=cidade" class="btn btn-outline-primary m-1">Cidade</a>
  <a href="index.php?categoria=natureza" class="btn btn-outline-primary m-1">Natureza</a>

</div>

<div class="container mt-5">
    <h2 class="text-center mb-5">Pacotes de Viagem</h2>
    <div class="row g-4">
        <?php
        $filtro = $_GET['categoria'] ?? 'todos';

        foreach ($pacotes as $pacote) {
            $categoriasDoPacote = (array) $pacote['categoria'];
            
            if ($filtro === 'todos' || in_array($filtro, $categoriasDoPacote)) {
                // Chama a função que agora já sabe mostrar se está esgotado
                mostrarPacote($pacote); 
            }
        }
        ?>
    </div>
</div>

<?php

require 'requires/footer.php';
?>