<div class="col-xl-6 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-body">
            <?= Sessao::mensagem('usuario') ?>
            <h2>Login</h2>

            <small>Preencha o formulario abaixo para fazer o login</small>

            <form name="login" method="POST" acion="<?= URL ?>usuarios/login">

                <div class="form-group">
                    <label for="email">E-mail: <sup class="text-danger">*</sup></label>
                    <input type="email" name="email" id="email" class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>" aria-describedby="emailHelp" value="<?= $dados['email'] ?>" required>
                    <div class="invalid-feedback"><?= $dados['email_erro'] ?></div>
                    <small id="emaiHelp" class="form-text text-muted">Digite um e-mail válido</small>

                </div>


                <div class="form-group">
                    <label for="senha">Senha <sup class="text-danger">*</sup></label>
                    <input type="password" name="senha" id="senha" class="form-control <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>" onfocusout="verificaSenha()" required>
                    <div class="invalid-feedback"><?= $dados['senha_erro'] ?></div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" value="Login" id="cadastrar" class="btn btn-info btn-block">
                    </div>
                    <div class="col-md-6">
                        <a href="<?= URL ?>usuarios/cadastrar">Você ja tem uma conta? cadastre-se</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>