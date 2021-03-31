<div class="container p-5">
    <h1 class="pouso text-white"><?= APP_NOME ?></h1>
    <p class="text-white">Seja bem-vindo ao meu portfólio, fique a vontade.</p>


    <h4 class="mt-5 mb-1 text-white">Veja alguns dos meu ultimos projetos</h4>
    <hr class="bg-danger">
    <div class="card-group row justify-content-between">
        <?php foreach ($dados['posts'] as $post) { ?>
            <div class="card m-1 bg-secondary">
                <img src="https://picsum.photos/536/354" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><a href="<?= URL . 'posts/post/' . $post->postID ?>" class=" text-white text-decoration-underline"><?= $post->titulo ?></a></h5>
                    <p class="card-text  text-white"><?= $post->texto ?></p>

                </div>
                <div class="card-footer">
                    <p class="card-text"><small class="text-white"><?= $post->criado_em ?> por
                            <a class="text-reset fw-bold"><?= $post->nome ?></a></small></p>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <button type="button" class="btn btn-light col-3 m-auto">Ver Todos</button>
    </div>
</div>