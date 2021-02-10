<?php

/*
    * Classe Rota
    * Cria as URL, carrega os controladores, métodos e parametros
    * Formato URL - /controlador/metodo/parametros

*/
class Rota
{
    //Atributos da classe

    //Variavel que define o objeto controlador padrão do projeto 
    private $controlador = 'Paginas';

    //Variavel que define o metodo padrão dos controladores
    private $metodo = 'index';

    //Array que recebe parametros
    private $parametros = [];

    public function __construct()
    {
        //Se a url existir, joga a função na variavel $url
        $url = $this->url() ? $this->url() : [0];

        //Verifica se existe o arquivo passado via URL no diretório Controllers.
        //ucwords - converte para maiúsculas o 1° caractere de cada palavra
        if (file_exists('../app/Controllers/' . ucwords($url[0]) . '.php')) {
            
            //Se existir seta como controlador
            $this->controlador = ucwords($url[0]);

            //unset - Destrói a varivel especificada
            unset($url[0]);
        }
        //Requere o controlador
        require_once '../app/Controllers/' . $this->controlador . '.php';
        //Instância o  controlador
        $this->controlador = new $this->controlador;


        //Verifica se existe metodo no controlador(seguna parte da URL).
        if (isset($url[1])) {
            //method_exists, verifica se existe o metodo na classe
            if (method_exists($this->controlador, $url[1])) {
                $this->metodo = $url[1];
                unset($url[1]);
            }
        }

        //Se existir, retorna um array com os valores, se não retorna um array vazio
        //array_values - retorna todos os valores de um array
        $this->parametros = $url ? array_values($url) : [];
        //call_user_func_array - chama uma dada funcao de usuario com um array de parametros
        call_user_func_array([$this->controlador, $this->metodo], $this->parametros);
    }

    //Retorna a url em um array
    private function url(){
        //O filtro FILTER_SANITIZE_URL remove todos os caracteres ilegais da URL
        $url =  filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        //Verifica se a url existe
        if (isset($url)) {
            //trim - Retira espaço no inicio e final de uma string
            //rtrim - Retira espaço em branco (ou caracteres) do final da String
            $url = trim(rtrim($url, '/'));
            //explode - Divide uma string em strings, retorna um array
            $url = explode('/', $url);
            return $url;
        }
    }
}
