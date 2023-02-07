<?php

$enunciado = '
Criar uma classe chamada Clientes, OKK

<br> esta classe deve conter os seguintes atributos e métodos: 

<br> Atributos: nome, email e telefone OKK 

<br> Métodos: exibir(); O método exibir deve exibir na tela todos os dados do cliente. okk

<br> a) Crie uma classe chamada ClienteFisica que estenda a classe Clientes. Adicione nesta classe o atributo $cpf; OKK

<br> b) Crie uma classe chamada ClienteJuridica que estenda a classe Clientes. Adicione nesta classe o atributo $cnpj; OKK

<br> c) Crie nas duas classes o seguinte método: getPessoa().okk 
      Este método deve retornar o CPF no caso de pessoa física ou CNPJ no caso de pessoa jurídica;

<br> d) Crie pelo menos 3 objetos e chame o metodo getPessoa(); okk

<br><br><br><br>
Ao final entregar no github de cada um.
';

echo $enunciado;

require_once ("cliente.php");

$oClientePF = new PFisica();
$oClientePF->nome = 'Yasmim';
$oClientePF->email = 'Yasmim@teste';
$oClientePF->tel = '99999-4444';
$oClientePF->cpf = '000.111.222-00';

echo '<br>';
echo $oClientePF->getPessoa();

$oClientePJ = new PJuridica();
$oClientePJ->nome = 'Yasmim';
$oClientePJ->email = 'Yasmim@teste';
$oClientePJ->tel = '99999-4444';
$oClientePJ->cnpj = '111.111.222-0001';

echo '<br>';
echo $oClientePJ->getPessoa();

$oClientePJ2 = new PJuridica();
$oClientePJ2->nome = 'Teste 2';
$oClientePJ2->email = 'Yasmim@teste';
$oClientePJ2->tel = '99999-4444';
$oClientePJ2->cnpj = '000.111.222-0001';

echo '<br>';
echo $oClientePJ2->getPessoa();



