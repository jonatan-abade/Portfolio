<?php
class Usuarios extends Controller
{
    public function cadastrar()
    {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($form)) {
            $dados = [
                'nome' => filter_var(trim($form['nome']), FILTER_SANITIZE_STRING),
                'email' => filter_var(trim($form['email']), FILTER_SANITIZE_EMAIL),
                'senha' => trim($form['senha']),
                'confirma_senha' => trim($form['confirma_senha'])
            ];

            if (in_array("", $form)) {
                if (empty($form['nome'])) {
                    $dados['nome_erro']  = 'Preencha o campo "Nome"...';
                }
                if (empty($form['email'])) {
                    $dados['email_erro']  = 'Preencha o campo "E-mail"...';
                }
                if (empty($form['senha'])) {
                    $dados['senha_erro']  = 'Preencha o campo "Senha"...';
                }
                if (empty($form['confirma_senha'])) {
                    $dados['confirma_senha_erro']  = 'Preencha o campo "Preencha o campo "confirma sua senha"...';
                }
            } else {
                if (Valida::validaNome($form['nome'])) {
                    $dados['nome_erro']  = 'O nome informado é invalido...';
                } elseif (Valida::validaEmail($form['email'])) {
                    $dados['email_erro']  = 'Digite um email válido...';
                } elseif (strlen($form['senha']) < 6) {
                    $dados['senha_erro']  = 'A senha deve ter no minimo 6 caracteres...';
                } elseif ($form['senha'] != $form['confirma_senha']) {
                    $dados['confirma_senha_erro']  = 'Senhas são diferentes"...';
                } else {
                    echo "tudo ok<hr>";
                }
            }
            var_dump($form);
        } else {
            $dados = [
                'nome' => "",
                'email' => "",
                'senha' => "",
                'confirma_senha' => ""
            ];
        }


        $this->view('usuarios/cadastrar', $dados);
    }
}
