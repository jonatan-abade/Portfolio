<div class="container">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL ?>posts">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $dados['posts']->titulo ?></a></li>
        </ol>
    </nav>
    <div class="card my-5">
        <div class="card-header">
            <?= $dados['posts']->titulo ?>
        </div>
        <div class="card-body">
            <p class="card-text"><?= $dados['posts']->texto ?></p>
        </div>
        <div class="card-footer text-muted">
            Escrito por: <?= $dados['usuario']->nome ?> em <?= $dados['posts']->criado_em ?>
        </div>
    </div>
</div>