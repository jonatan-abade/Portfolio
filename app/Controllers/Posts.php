<?php

class Posts extends Controller
{
    public function __construct()
    {
        Sessao::isLogado();
        $this->postsModel = $this->model('Post');
    }

    public function index()
    {
        $this->view('posts/index');
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
}
