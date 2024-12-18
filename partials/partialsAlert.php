<?php session_start()?>
<div class="row">
    <div class="container-fluid">
    <?php if (isset($_SESSION['mensagem'])): ?>
        <div class="alert alert-<?= isset($_SESSION['mensagem']['sucesso']) ? 'success' : 'danger' ?>" role="alert">
            <?= $_SESSION['mensagem']['sucesso'] ?? $_SESSION['mensagem']['erro'] ?>
        </div>
        <?php unset($_SESSION['mensagem']); ?>
    <?php endif; ?>
    </div>
</div>