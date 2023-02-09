<?php

require_once ("ClienteFisica.php");
require_once ("ClienteJuridica.php");

echo "<hr>";
echo "<h1>Exercicio 03</h1>";
echo "<hr>";

$oPessoaFisica = new ClienteFisica();
$oPessoaFisica->nome = "Maria";
$oPessoaFisica->email = "Maria";
$oPessoaFisica->telefone = "4798854-4848";
$oPessoaFisica->cpf = "061.014.145-88";

echo "<br>Pessoa Física:" . $oPessoaFisica->getPessoa();

$oPessoaJuridica = new ClienteJuridica();
$oPessoaJuridica->nome = "Maria";
$oPessoaJuridica->email = "Maria";
$oPessoaJuridica->telefone = "4798854-4848";
$oPessoaJuridica->cnpj = "061.014.110.001-88";

echo '<hr>';

echo "<br>Pessoa Juridica:" . $oPessoaFisica->getPessoa();

