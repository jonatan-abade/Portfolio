<?php

class Posts extends Controller
{
    public function __construct()
    {
        Sessao::isLogado();
        $this->postsModel = $this->model('Post');

        $this->usuarioModel = $this->model('Usuario');
    }

    public function index()
    {
        $dados = [
            'posts' => $this->postsModel->lerPosts()
        ];
        $this->view('posts/index', $dados);
    }

    public function cadastrar()
    {

        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($form)) {
            $dados = [
                'titulo' => filter_var(trim($form['titulo']), FILTER_SANITIZE_STRING),
                'usuario_id' => $_SESSION['usuario_id'],
                'texto' => filter_var(trim($form['texto']), FILTER_SANITIZE_STRING)
            ];

            if (in_array("", $form)) {
                if (empty($form['titulo'])) {
                    $dados['titulo_erro']  = 'Preencha o campo "Titulo"...';
                }
                if (empty($form['texto'])) {
                    $dados['texto_erro']  = 'Preencha o campo "Texto"...';
                }
            } else {
                if ($this->postsModel->Cadastrar($dados)) {
                    Sessao::mensagem('post', 'Post cadastrado com sucesso!!!');
                    Url::redirecionar('posts');
                } else {
                    die('Erro ao cadastrar Post...');
                }
            }
        } else {
            $dados = [
                'titulo' => "",
                'texto' => "",
                'titulo_erro' => "",
                'texto_erro' => ""
            ];
        }


        $this->view('posts/cadastrar', $dados);
    }

    public function editar($id)
    {

        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($form)) {
            $dados = [
                'id' => $id,
                'titulo' => filter_var(trim($form['titulo']), FILTER_SANITIZE_STRING),
                'texto' => filter_var(trim($form['texto']), FILTER_SANITIZE_STRING)
            ];

            if (in_array("", $form)) {
                if (empty($form['titulo'])) {
                    $dados['titulo_erro']  = 'Preencha o campo "Titulo"...';
                }
                if (empty($form['texto'])) {
                    $dados['texto_erro']  = 'Preencha o campo "Texto"...';
                }
            } else {
                if ($this->postsModel->atualizar($dados)) {
                    Sessao::mensagem('post', 'Post atualizado com sucesso!!!');
                    Url::redirecionar('posts');
                } else {
                    die('Erro ao atualizar Post...');
                }
            }
        } else {

            $post = $this->postsModel->lerPost($id);

            if ($post->usuario_id != $_SESSION['usuario_id']) {
                Sessao::mensagem('post', 'Você não tem autorização para editar este post', 'alert alert-danger');
                Url::redirecionar('posts');
            }

            $dados = [
                'id' => $post->id,
                'titulo' => $post->titulo,
                'texto' => $post->texto,
                'titulo_erro' => "",
                'texto_erro' => ""
            ];
        }


        $this->view('posts/editar', $dados);
    }

    public function post($id)
    {
        $post = $this->postsModel->lerPost($id);
        $usuario = $this->usuarioModel->lerUsuario($post->usuario_id);

        $dados = [
            'posts' => $post,
            'usuario' => $usuario
        ];
        $this->view('posts/post', $dados);
    }

    public function excluir($id)
    {
        if (!$this->chegarAutoria($id)) {

            $id = filter_var($id, FILTER_VALIDATE_INT);
            $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

            if ($id && $metodo == 'POST') {
                if ($this->postsModel->excluir($id)) {
                    Sessao::mensagem('post', 'Post deletado com sucesso');
                    Url::redirecionar('posts');
                }
            } else {
                Sessao::mensagem('post', 'Você não tem autorização para excluir este post', 'alert alert-danger');
                Url::redirecionar('posts');
            }
        }
    }
    private function chegarAutoria($id)
    {
        $post = $this->postsModel->lerPost($id);

        if ($post->usuario_id != $_SESSION['usuario_id']) {
            return true;
        } else {
            return false;
        }
    }
}
