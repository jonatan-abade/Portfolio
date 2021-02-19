<?php

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function chegarEmail($email)
    {
        $this->db->query('SELECT email FROM usuarios WHERE email = :email');
        $this->db->bind(':email', $email);

        if ($this->db->resultado()) {
            return true;
        } else {
            return false;
        }
    }

    public function Cadastrar($dados)
    {
        $this->db->query('INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)');
        $this->db->bind(':nome', $dados['nome']);
        $this->db->bind(':email', $dados['email']);
        $this->db->bind(':senha', $dados['senha']);

        if ($this->db->executa()) {
            return true;
        } else {
            return false;
        }
    }

    public function chegarLogin($email, $senha)
    {
        $this->db->query('SELECT * FROM usuarios WHERE email = :email');
        $this->db->bind(':email', $email);

        if ($this->db->resultado()) {
            $result = $this->db->resultado();
            if (password_verify($senha, $result->senha)) {
                return $result;
            }
        } else {
            return false;
        }
    }


    public function lerUsuario($id)
    {

        $this->db->query('SELECT * FROM  usuarios WHERE id = :id');

        $this->db->bind(':id', $id);

        return $this->db->resultado();
    }
}
