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
            <?php
            foreach ($dados['posts'] as $post) { ?>
                <div class="card my-5">
                    <div class="card-header">
                        <?= $post->titulo ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?= $post->texto ?></p>
                        <a href="<?= URL . 'posts/post/' . $post->postID ?>" class="btn btn-primary">Ver mais sobre</a>
                    </div>
                    <div class="card-footer text-muted">
                        Escrito por: <?= $post->nome ?> em <?= Valida::dataBr($post->dataCadastro) ?>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
</div>