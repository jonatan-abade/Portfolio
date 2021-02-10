<?php
/**
 * Controlador Base
 * Carrega os modelos e a views
 */
class Controller{

    //carrega os modelos
    public function model($model){
        //requere o arquivo de modelo
        require_once '../app/Models/'.$model.'.php';
        //instancia o modelo
        return new $model;
    }

    //carrega as views
    public function view($view, $dados = []){
        $arquivo = ('../app/Views/'.$view.'.php');
        if(file_exists($arquivo)){
            //requere o arquivo de view
            require_once $arquivo;
        }else{
            //A função die() termina a execução do script
            die('O arquivo de view não existe');
        }
    }
}