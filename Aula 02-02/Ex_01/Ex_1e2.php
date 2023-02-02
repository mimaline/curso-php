<?php

require_once("Calculadora.php");

$oCalculadora = new Calculadora();


$oCalculadora->soma(2,3);
echo 'A soma 2+3 eh igual a: ' . $oCalculadora->getIgualdade() . '<br>';
$oCalculadora->subtracao(2,3);
echo 'A subtracao 2-3 eh igual a: ' . $oCalculadora->getIgualdade() . '<br>';
$oCalculadora->multiplicacao(2,3);
echo 'A multiplicacao 2*3 eh igual a: ' . $oCalculadora->getIgualdade() . '<br>';
$oCalculadora->divisao(2,3);
echo 'A divisao 2/3 eh igual a: ' . $oCalculadora->getIgualdade() . '<br>';

echo '########## FATORIAL ########### <br>';

$oCalculadora->fatorial(5);
echo 'O fatorial de 5 eh: ' . $oCalculadora->getIgualdade() . '<br>';