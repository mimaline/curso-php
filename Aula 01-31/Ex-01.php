<?php
// faça um algoritimo para verificar se uma palavra é palindroma (igual de trás para frente) ex. ana, arara, civic

$palavra = 'boi';

$tamanho = strlen($palavra);

echo 'Palavra: ' . $palavra . ' Tamanho: ' . $tamanho;

for ($i = 0; $i < $tamanho; $i++) {
    $letra = $palavra[$i];
    // echo '<br> Letra ' . $letra . ' na posicao ' . $i;
}
echo '<br';
$aNovaPalavra = "";

for ($i = $tamanho-1; $i>=0; $i--) {
    $letra = $palavra[$i];
    // echo '<br> Letra ' . $letra . ' na posicao ' . $i;
    $aNovaPalavra .= $letra;
}

if ($palavra == $aNovaPalavra) {
    echo '<br><br> Palavra ' . $palavra . ' eh palindroma';
} else {
    echo '<br><br> Palavra ' . $palavra . ' nao eh palindroma';
}
