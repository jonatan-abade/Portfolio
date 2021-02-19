<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
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
