<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function lerPost($id)
    {
        $this->db->query('SELECT * FROM  posts WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->resultado();
    }

    public function lerPosts()
    {
        $this->db->query('SELECT *, p.criado_em as dataCadastro, u.id as usuarioID, p.id as postID FROM usuarios u JOIN posts p on p.usuario_id = u.id ORDER BY p.criado_em DESC');

        return $this->db->resultados();
    }

    public function Cadastrar($dados)
    {
        $this->db->query('INSERT INTO posts (usuario_id, titulo, texto) VALUES (:usuario_id, :titulo, :texto)');
        $this->db->bind(':usuario_id', $dados['usuario_id']);
        $this->db->bind(':titulo', $dados['titulo']);
        $this->db->bind(':texto', $dados['texto']);

        if ($this->db->executa()) {
            return true;
        } else {
            return false;
        }
    }
}
