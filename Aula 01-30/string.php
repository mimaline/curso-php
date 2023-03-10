<?php

echo 'Arquivo String';

echo '<br><br>';

if(isset($_GET["palavra"])) {
    $palavra = $_GET["palavra"];
    
    echo 'Palavra = ' . $palavra;
    echo '<br><br>';
    
    $tamanho = strlen($palavra);
    echo 'Tamanho: ' . $tamanho;
    echo '<br><br>';
    
    echo 'Percorrendo as letras da palavra:';
    echo '<br><br>';

    $aNovaPalavra = array();

    for ( $i = 0; $i < $tamanho; $i++){
        $letra = $palavra[$i];
        echo 'Letra: ' . $letra . ' na posição: ' . $i;
        echo '<br>';

        $aNovaPalavra[] = $letra;
    }
    echo '<br><br>';
    echo 'Nova Palavra: ';
    echo '<br>';
    $tamanho = count($aNovaPalavra);
    
    for ( $i = 0; $i < $tamanho; $i++){
        $letra = $aNovaPalavra[$i];
        echo 'Letra Nova: ' . $letra . ' na posição: ' . $i;
        echo '<br>';
    }

    // faça um algoritimo para verificar se uma palavra é palindroma (igual de trás para frente)

    function mostraPalavra($palavra){
        if(is_array($palavra)){
            $tamanho = count($palavra);
        }else if(is_string($palavra)){
            $tamanho = strlen($palavra);
        } else {
            throw new Exception("Palavra Inválida!");
        }


        for ($i = 0; $i < $tamanho; $i++){
            $letra = $palavra[$i];
            echo '<br>Letra: ' . $letra . ' - posição ' . $i;
        }
    }

    function isPalindroma($palavra) {

        if(is_array($palavra)){
            $tamanho = count($palavra);
        }else if(is_string($palavra)){
            $tamanho = strlen($palavra);
        } else {
            throw new Exception("Palavra Inválida!");
        }

        $palindromo = false;
        $aPalavraInvertida = array();

        for ($i = $tamanho; $i >= 0; $i--) {
            $letra = $palavra[$i];
            echo 'Letra: ' . $letra . ' na posição: ' . $i;
            echo '<br>';
    
            $aPalavraInvertida[$i] = $letra;
        }

        //         for (int i = 0; i < len; i++) {
//             if (palindromo.charAt(i) != palindromo.charAt(len - i - 1)) {
//                 pali = false;
//              }
//         }

        for ($i=0; $i < $tamanho; $i++) {
            if ($palavra[$i] = $aPalavraInvertida[$i]) {
                $palindromo = true;
            }
        }

        //verifica se é palindroma

        if ($palindromo) {
            echo 'A palavra ' . $palavra . ' é palindroma';
        } else {
            echo 'A palavra ' . $palavra . ' não é palindroma';   
        }
    }

    isPalindroma("maria");

} else {
    echo 'Parametros Invalidos';
}