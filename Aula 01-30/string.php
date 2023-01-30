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
        $palindromo = false;
        $aPalavraInvertida = array();

        for ($i = $tamanho; $i >= 0; $i--) {
            $letra = $palavra[$i];
            echo 'Letra: ' . $letra . ' na posição: ' . $i;
            echo '<br>';
    
            $aPalavraInvertida[$i] = $letra;
        }

        for ($i=0; $i < $tamanho; $i++) {
            if ($palavra[$i] = $aPalavraInvertida[$i]) {
                echo 'Posição ' . $i . 'letras iguais ' . $palavra[$i] . ' ' . $aPalavraInvertida[$i];
                $letrasIguais++;
            }
        }

        if ($tamanho = $letrasIguais) {
            $palindromo = true;
        } else {
            $palindromo = false;
        }


        //verifica se é palindroma

        if ($palindromo) {
            echo 'A palavra ' . $palavra . ' é palindroma';
        } else {
            echo 'A palavra ' . $palavra . ' não é palindroma';   
        }
    }

    isPalindroma("arara");

} else {
    echo 'Parametros Invalidos';
}

// package Aula16Ago2022;

// import java.util.Scanner;

// public class Aula_Ex_08 {
//     public static void main(String[] args) {
//         // Faça um algoritmo que leia um nome e o guarde na memória.
//         //Após a leitura, verifique se a palavra é um palíndromo.
//         //Um palíndromo é aquela palavra que a sua leitura é a mesma da esquerda para a direita e vice versa. Exemplo: ARARA, ANA, etc.

//         Scanner sc = new Scanner(System.in);
//         String palindromo;
//         boolean pali = true;

//         System.out.println("Insira uma palavra:");
//         palindromo = sc.next();
//         int len = palindromo.length();

//         for (int i = 0; i < len; i++) {
//             if (palindromo.charAt(i) != palindromo.charAt(len - i - 1)) {
//                 pali = false;
//              }
//         }
//         if (pali) {
//             System.out.println(palindromo + " é palíndromo!");
//         } else {
//             System.out.println(palindromo + " não é palíndromo!");

//         }

//     }
// }