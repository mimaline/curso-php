<?php

    function aulaTiposDeDados() {
    // echo 'ola mundo';
    // Três principais tipos:
    //      Tipo Numérico - int - long - float
    //      Tipo Texto (String) - Classe String
    //      Tipo Lógico True/False
    //      Tipo Objeto - Não principal, porém um tipo usado em Orientação à Objeto

    $var = "oi";

    var_dump($var); //verifica o tipo da variavel

    echo '<br>';

    $var2 = "1";

    var_dump($var2); //verifica o tipo da variavel

    echo '<br>';
    
    $var3 = false;
    
    var_dump($var3); //verifica o tipo da variavel
    
    echo '<br>';

    $objetoPessoa = new stdClass();
    $objetoPessoa ->codigo = 1;
    $objetoPessoa ->nome = "João";
    $objetoPessoa ->idade = 36;
    var_dump($objetoPessoa);
    }

    // chamar a função:

    // AulaTiposDeDados();

    $html = '<a href="http://localhost/curso-php-1/Aula 01-30/arquivo.php">Chamando Arquivo PHP </a>';

    echo $html;


    

