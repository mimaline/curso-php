<?php
require_once ("Cliente.php");
require_once ("ContaBancaria.php");

$oCliente = new Cliente();
$oCliente->nome = "Maria";
$oCliente->email = "maria@email.com";
$oCliente->telefone = "(47)98854-4848";
$oCliente->cpf = "061.023.142-88";

$oContaBancaria = new ContaBancaria($oCliente, 500, "08/02/2023");

$oContaBancaria->sacar(100);
echo "<hr>";

$oContaBancaria->depositar(500);

echo "<hr>";
$oContaBancaria->exibeSaldo();

echo "<hr>";
$oContaBancaria->exibeExtrato();
