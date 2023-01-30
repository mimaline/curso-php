<?php

echo 'Inicio do arquivo.php';
echo '<br>';
echo 'pegando dados dos parametros da url';
echo '<br>';

$nome_parametro = $_GET["nome"];
$idade_parametro = $_GET["idade"];

$frase = "Meu nome é " . $nome_parametro . ' e tenho ' . $idade_parametro . ' anos!';

echo $frase;