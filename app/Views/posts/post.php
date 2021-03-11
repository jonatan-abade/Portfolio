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
            <br>
            <br>
            <?php
            if ($dados['posts']->usuario_id == $_SESSION['usuario_id']) { ?>
                <ul class="list-inline center">
                    <li class="list-inline-item">
                        <a class="btn btn-sm btn-primary" href="<?= URL ?>posts/editar/<?= $dados['posts']->id ?>">Editar</a>
                    </li>

                    <li class="list-inline-item">
                        <form action="<?= URL . 'posts/excluir/' . $dados['posts']->id ?>" method="POST">
                            <button type="type" type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </li>
                </ul>

            <?php } ?>
        </div>
    </div>
</div>