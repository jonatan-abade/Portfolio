<?php

/**
 * Arquivo de configuração
 */

//_FILE_ - constante magica. Retorna o caminho completo e o nome do arquivo
//dirname - retorna o caminho /path do diretório pai

//define e const - Define uma constante. As constantes não podem ser alteradas depois de declaradas.

define('DB', [
    'HOST' => 'localhost',
    'USUARIO' => 'root',
    'BANCO' => 'portfolio',
    'SENHA' => '',
    'PORTA' => 3306
]);
define('APP',  dirname(__FILE__));

define('URL', 'http://localhost/Portfolio/');

define('APP_NOME', 'PHP 7 Orientado a objetos / MVC');

define('VERSAO', '1.0');


