<?php
class Usuarios extends Controller
{

    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');
    }

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
                    $dados['confirma_senha_erro']  = 'Preencha o campo "confirma sua senha"...';
                }
            } else {
                //Verifica se o nome enviado no formulário é válido
                if (Valida::validaNome($form['nome'])) {
                    $dados['nome_erro']  = 'O nome informado é invalido...';
                }
                //Verifica se o email passado no formulario é valido
                elseif (Valida::validaEmail($form['email'])) {
                    $dados['email_erro']  = 'Digite um email válido...';
                }
                //Verifica se o email ja foi cadastrado no banco de dados
                else if ($this->usuarioModel->chegarEmail($form['email'])) {
                    $dados['email_erro']  = 'O email informado já foi cadastrado...';
                }
                //Verifica se a senha é maior que 6
                elseif (strlen($form['senha']) < 6) {
                    $dados['senha_erro']  = 'A senha deve ter no minimo 6 caracteres...';
                }
                //Verifica se as senhas são iguais
                elseif ($form['senha'] != $form['confirma_senha']) {
                    $dados['confirma_senha_erro']  = 'Senhas são diferentes"...';
                } else {
                    $dados['senha'] = password_hash($form['senha'], PASSWORD_DEFAULT);

                    if ($this->usuarioModel->Cadastrar($dados)) {
                        Sessao::mensagem('usuario', 'Usuario cadastrado com sucesso!!!');
                        Url::redirecionar('Usuarios/login');
                    } else {
                        die("Erro ao armazenar no banco de dados");
                    }
                }
            }
        } else {
            $dados = [
                'nome' => "",
                'email' => "",
                'senha' => "",
                'confirma_senha' => "",
                'nome_erro' => "",
                'email_erro' => "",
                'senha_erro' => "",
                'confirma_senha_erro' => ""
            ];
        }


        $this->view('usuarios/cadastrar', $dados);
    }

    public function login()
    {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($form)) {
            $dados = [
                'email' => filter_var(trim($form['email']), FILTER_SANITIZE_EMAIL),
                'senha' => trim($form['senha']),
            ];

            if (in_array("", $form)) {
                if (empty($form['email'])) {
                    $dados['email_erro']  = 'Preencha o campo "E-mail"...';
                }
                if (empty($form['senha'])) {
                    $dados['senha_erro']  = 'Preencha o campo "Senha"...';
                }
            } else {
                //Verifica se o email passado no formulario é valido
                if (Valida::validaEmail($form['email'])) {
                    $dados['email_erro']  = 'Digite um email válido...';
                } else if (!$this->usuarioModel->chegarEmail($form['email'])) {
                    $dados['email_erro']  = 'Email não cadastrado...';
                } else {

                    $usuario = $this->usuarioModel->chegarLogin($form['email'], $form['senha']);

                    if ($usuario) {
                        $this->criarSessaoUsuario($usuario);
                    } else {
                        Sessao::mensagem('usuario', 'Usuario ou senha invalidos', 'alert alert-danger');
                    }
                }
            }
        } else {
            $dados = [
                'email' => "",
                'senha' => "",
                'email_erro' => "",
                'senha_erro' => ""
            ];
        }


        $this->view('Usuarios/login', $dados);
    }

    private function criarSessaoUsuario($usuario)
    {
        $_SESSION['usuario_id'] = $usuario->id;
        $_SESSION['usuario_nome'] = $usuario->nome;
        $_SESSION['usuario_email'] = $usuario->email;

        Url::redirecionar('Posts');
    }

    public function sair()
    {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);

        session_destroy();

        Url::redirecionar('Usuarios/login');
    }
}
