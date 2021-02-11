<?php

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $banco = 'portfolio';
    private $pass = '';
    private $port = 3306;
    private $dbh;
    private $stmt;

    public function __construct()
    {
        //Fonte de dados ou DNS contém informações necessárias para conectar ao banco de dados.
        $dns = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->banco;
        $opcoes = [
            //Armazena em cache a conexão para ser reutilizada, evita a sobrecarga de uma nova conexão em um aplicativo mais rapido
            PDO::ATTR_PERSISTENT => true,
            //Lança um PDOException se ocorrer um erro
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            //Cria a instancia do PDO
            $this->dbh = new PDO($dns, $this->user, $this->pass, $opcoes);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    //Prepara statements com query
    public function query($sql)
    {
        //prepara uma consulta sql
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($parametro, $valor, $tipo = null)
    {
        if (is_null($tipo)) {
            switch (true) {
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                    break;
                default:
                    $tipo = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($parametro, $valor, $tipo);
    }
    //Executa prepared statemente
    public function executa()
    {
        return $this->stmt->execute();
    }

    //Obtém um único registro
    public function resultado()
    {
        $this->executa();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    //Obtém um conjunto de registros
    public function resultados()
    {
        $this->executa();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Retorna o número de linhas afetadas pela última instrução do sql
    public function totalResult()
    {
        return $this->stmt->rowCount();
    }

    //retorna o último ID inserido no banco de Dados
    public function ultimoIdInserido()
    {
        return $this->dbh->lastInsertId();
    }
}
