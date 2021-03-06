<?php

class Paginas extends Controller
{

    public function index()
    {
        $this->postsModel = $this->model('Post');

        $dados = [
            'posts' => $this->postsModel->lerPosts()
        ];
        $this->view('paginas/home', $dados);
    }

    public function sobre()
    {
        $dados = [
            'titulo' => 'Sobre nós',
            'descricao' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At accusamus et unde deserunt quo minima adipisci quae culpa dicta laudantium itaque, porro id consequatur omnis maxime exercitationem libero facere quos.',

        ];
        $this->view('paginas/sobre', $dados);
    }
}
