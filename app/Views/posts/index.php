<div class="container py-5">
    <?= Sessao::mensagem('post') ?>
    <div class="card">
        <div class="card-header bg-info text-white">
            Postagens
            <div class="float-right">
                <a class="btn btn-light" href="<?= URL ?>posts/cadastrar">Postar</a>
            </div>
        </div>
        <div class="card-body">
            <p>Listar Posts</p>
        </div>
    </div>
</div>