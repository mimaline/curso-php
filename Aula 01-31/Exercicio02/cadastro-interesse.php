<?php

function grava_interesse_candidato($email_candidato, $nome_candidato, $cidade_candidato, $telefone_candidato, $interesse_candidato){
    $candidato_atual = array();
    $candidato_atual["email"] = $email_candidato;
    $candidato_atual["nome"] = $nome_candidato;
    $candidato_atual["cidade"] = $cidade_candidato;
    $candidato_atual["telefone"] = $telefone_candidato;
    $candidato_atual["interesse"] = $interesse_candidato;

    // Verificar se existe algum candidato gravado na lista de dados
    $arquivo = "listacandidatos.json";

    // Inicia a lista de candidatos vazia
    $lista_candidatos = array();
    if(file_exists($arquivo)){
        // Se existe candidato, adiciona os candidatos na lista
        $lista_candidatos = file_get_contents($arquivo);

        // Adicionar o novo candidato na lista de dados existente
        $lista_candidatos = json_decode($lista_candidatos, true);
    }

    // Adiciono o candidato atual no array de candidatos
    $lista_candidatos[] = $candidato_atual;

    $lista_candidatos_json = json_encode($lista_candidatos);

    file_put_contents("listacandidatos.json", $lista_candidatos_json);

    echo '<br> Interesse Registrado com Sucesso! <br>';
    //    echo '<pre>' . print_r($lista_candidatos, true) . '</pre>';
}

function inicia_pagina_candidato() {
    // echo '<link rel="stylesheet" href="style.css">';
    echo '################ <b> Cadastro de Interesse Realizado com Sucesso! </b>############';
    echo '<br>';
}

function mostra_mensagem_candidato($email_candidato, $nome_candidato, $cidade_candidato, $telefone_candidato, $interesse_candidato) {

    // Coloca a primeira letra da string em maiusculo
    $nome_candidato = ucfirst($nome_candidato);

    // Coloca a primeira letra de cada palavra na string em maiusculo
    $nome_candidato = ucwords($nome_candidato);


    switch ($interesse_candidato) {
        case 1:
            $textointeresse = "Curso de PHP";
            break;
        case 2:
            $textointeresse = "Curso de Java";
            break;
        case 3:
            $textointeresse = "Curso de Python";
            break;
       default:
            $textointeresse = "Nenhum dos nossos cursos :(";
    }
    
    
    // Deixando os texto en negrito
    $nome_candidato = "<b>" . $nome_candidato . "</b>";
    $textointeresse = "<b>" . $textointeresse . "</b>";
    

    $frase_candidato = "Olá candidato " . $nome_candidato . " <br> Seja bem vindo a nossa empresa!<br>
    Voce demonstrou interesse em " . $textointeresse . ", <br>
    logo lhe enviaremos mais informacoes sobre esse curso!<br>";

    echo "<p>" . $frase_candidato . "</p>";

    
}

$email_candidato     = $_GET["email"];
$nome_candidato      = $_GET["nome"]; 
$cidade_candidato    = $_GET["cidade"]; 
$telefone_candidato  = $_GET["telefone"];
$interesse_candidato = $_GET["interesse"];

inicia_pagina_candidato();

mostra_mensagem_candidato($email_candidato, $nome_candidato, $cidade_candidato, $telefone_candidato, $interesse_candidato);

grava_interesse_candidato($email_candidato, $nome_candidato, $cidade_candidato, $telefone_candidato, $interesse_candidato);

$botao_voltar = "<a href='index.php'>Voltar</a>";
echo '<br>' . $botao_voltar;