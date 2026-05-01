<?php
require_once 'funcoes/funcoes.php'; 
require_once 'dados.php'; 

require 'requires/header.php';

?>

<!-- Seção de Contato -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold text-body-emphasis">Entre em Contato</h1>
                <p class="lead text-muted">Temos prazer em ouvir de você. Envie-nos uma mensagem!</p>
            </div>

            <!-- Formulário de Contato -->
            <div class="card shadow-lg border-0">
                <div class="card-body p-5">
                    <form>
                        <!-- Campo Nome -->
                        <div class="mb-3">
                            <label for="nome" class="form-label fw-bold">Nome Completo</label>
                            <input 
                                type="text" 
                                class="form-control form-control-lg" 
                                id="nome" 
                                placeholder="Seu nome completo" 
                                required>
                        </div>

                        <!-- Campo Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input 
                                type="email" 
                                class="form-control form-control-lg" 
                                id="email" 
                                placeholder="seuemail@exemplo.com" 
                                required>
                        </div>

                        <!-- Campo Assunto -->
                        <div class="mb-3">
                            <label for="assunto" class="form-label fw-bold">Assunto</label>
                            <input 
                                type="text" 
                                class="form-control form-control-lg" 
                                id="assunto" 
                                placeholder="Qual é o assunto de sua mensagem?" 
                                required>
                        </div>

                        <!-- Campo Mensagem -->
                        <div class="mb-4">
                            <label for="mensagem" class="form-label fw-bold">Mensagem</label>
                            <textarea 
                                class="form-control form-control-lg" 
                                id="mensagem" 
                                rows="6" 
                                placeholder="Escreva sua mensagem aqui..." 
                                required></textarea>
                        </div>

                        <!-- Botões -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary btn-lg px-4">Enviar Mensagem</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'requires/footer.php'; ?>

