<?php

require_once("Clientes.php");

$oCliente = new Cliente();
$oCliente->nome  = 'Yasmim';
$oCliente->email = 'yasmim@teste.com';
$oCliente->tel   = '999994444';

echo $oCliente->exibir();
