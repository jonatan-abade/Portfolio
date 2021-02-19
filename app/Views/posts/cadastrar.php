<div class="col-xl-12 col-md-6 mx-auto p-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL ?>posts">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar</a></li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h2>Cadastrar novo Projeto</h2>
            <br>
            <form name="cadastrar" method="POST" acion="<?= URL ?>posts/cadastrar">
                <div class="form-group">
                    <label for="titulo">Título: <sup class="text-danger">*</sup></label>
                    <input type="text" name="titulo" id="titulo" class="form-control <?= $dados['titulo_erro'] ? 'is-invalid' : '' ?>" value="<?= $dados['titulo'] ?>" required>
                    <div class="invalid-feedback"><?= $dados['titulo_erro'] ?></div>
                </div>

                <div class="form-group">
                    <label for="texto">Texto: <sup class="text-danger">*</sup></label>
                    <textarea rows="10" name="texto" id="texto" class="form-control <?= $dados['texto_erro'] ? 'is-invalid' : '' ?>" required><?= $dados['texto'] ?></textarea>
                    <div class="invalid-feedback"><?= $dados['texto_erro'] ?></div>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Cadastrar" id="cadastrar" class="btn btn-info btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>