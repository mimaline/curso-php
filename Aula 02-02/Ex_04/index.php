<?php

require_once("ContaBancaria.php");
require_once("Cliente.php");

$oCliente = new Cliente();
$oCliente->nome = 'Joao';
$oCliente->email = 'Email';
$oCliente->tel = '4799999-4444';

$oContaBancaria = new ContaBancaria($oCliente, 500, '10-01-2023');

echo 'Nome do Cliente: ' . $oContaBancaria->getCliente()->getNome() . '<br>';
echo $oContaBancaria->exibeSaldo();

echo $oContaBancaria->sacar(200);
