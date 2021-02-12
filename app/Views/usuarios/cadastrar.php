<div class="col-xl-6 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-body">
            <h2>cadastro</h2>

            <small>Preencha o formulario abaixo para fazer o seu cadastro</small>

            <form name="cadastrar" method="POST" acion="<?= URL ?>usuarios/cadastrar">
                <div class="form-group">
                    <label for="nome">Nome: <sup class="text-danger">*</sup></label>
                    <input type="text" name="nome" id="nome" class="form-control <?= $dados['nome_erro'] ? 'is-invalid' : '' ?>" value="<?= $dados['nome'] ?>" required>
                    <div class="invalid-feedback"><?= $dados['nome_erro'] ?></div>
                </div>

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
                <div class="form-group">
                    <label for="confima_senha">Confirme sua senha <sup class="text-danger">*</sup></label>
                    <input type="password" id="confima_senha" name="confirma_senha" class="form-control <?= $dados['confirma_senha_erro'] ? 'is-invalid' : '' ?>" onkeyup="verificaSenha()" required>
                    <div class="invalid-feedback"><?= $dados['confirma_senha_erro'] ?></div>
                </div>

                <div id="status_senhas_iguais" role="alert"></div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Cadastrar" id="cadastrar" disabled class="btn btn-info btn-block">
                    </div>
                    <div class="col">
                        <a href="#">Você ja tem uma conta? Faça login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var senha = document.querySelector("input#senha")
    var confimar_senha = document.querySelector("input#confima_senha")
    var status_senha_iguais = document.querySelector("div#status_senhas_iguais")
    var btn_cadastrar = document.querySelector("input#cadastrar")

    function verificaSenha() {


        if (senha.value.length >= 3)
            if (senha.value === confimar_senha.value) {
                status_senha_iguais.classList.remove("alert-danger")
                status_senha_iguais.classList.add("alert")
                status_senha_iguais.classList.add("alert-success")
                status_senha_iguais.innerText = "senhas idênticas"
                var btn_cadastrar = document.querySelector("input#cadastrar").disabled = false
            } else {
                status_senha_iguais.classList.remove("alert-success")
                status_senha_iguais.classList.add("alert")
                status_senha_iguais.classList.add("alert-danger")
                status_senha_iguais.innerText = "senhas não idênticas"
                var btn_cadastrar = document.querySelector("input#cadastrar").disabled = true
            }
    }
</script>