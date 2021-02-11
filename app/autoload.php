<?php

/**
 * autoload - Responsavel pelo carregamento automático das classes
 */

//a funcção spl_autoload_register registra qualquer número de autoloaders, permitindo que classes e interfaces sejam automaticamente carregadas
spl_autoload_register(function ($classe) {
    //Lista de diretórios para buscar as classes
    $diretorios = [
        'Libraries',
        'Helpers'
    ];
    //percorre os diretórios para buscar as classes
    foreach ($diretorios as $diretorio) {
        //a constante __DIR__ retorna o diretório do arquivo
        //DIRECTORY_SEPARATOR é o separador utilizado para percorrer diretórios.
        $arquivos = (__DIR__ . DIRECTORY_SEPARATOR . $diretorio . DIRECTORY_SEPARATOR . $classe . '.php');
        //verifica se o arquivo de classe existe
        if (file_exists($arquivos)) {
            //inclui o arquico classe
            require_once($arquivos);
        }
    }
});
