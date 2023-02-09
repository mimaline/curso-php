<?php

echo 'Aula 09/02/2023';

function getDados(){

    $pdo = getConexao();

    $query = "SELECT * FROM `contato` WHERE `contato_id` = :contato_id";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return $result;
    }

    return array();
}

function getColunasTabela(){
    
    $html_colunas_tabela    = "";

    $aDados = getDados();

    if(count($aDados)) {

    } else {
        $html_colunas_tabela    = ""; 
    }
    
    //inicia linha
    $html_colunas_tabela    .="<tr>";
    
    //colunas
    $html_colunas_tabela    .="<th>Registro</th>";
    $html_colunas_tabela    .="<th>Registro</th>";
    $html_colunas_tabela    .="<th>Registro</th>";
    $html_colunas_tabela    .="<th>Registro</th>";
    $html_colunas_tabela    .="<th>Registro</th>";
    $html_colunas_tabela    .="<th>Registro</th>";
    $html_colunas_tabela    .="<th>Registro</th>";

    //finaliza linha
    $html_colunas_tabela    .="</tr>";

    return $html_colunas_tabela;

}


// require_once ('select.php');

// lista de contatos em html com os dados do bd (tabela html);

$html_tabela ="<table border='1'>";
//inicio cabeçalho
$html_tabela .="<thead>";
//inicia linha
$html_tabela    .="<tr>";
//colunas cabeçalho
$html_tabela        .="<th>Id</th>";
$html_tabela        .="<th>Nome</th>";
$html_tabela        .="<th>Sobrenome</th>";
$html_tabela        .="<th>Endereço</th>";
$html_tabela        .="<th>Telefone</th>";
$html_tabela        .="<th>Email</th>";
$html_tabela        .="<th>Data de Nasc.</th>";
//fechamento do cabeçalho
$html_tabela    .="</tr>";
$html_tabela .="</thead>";

//dados do corpo da tabela
//inicia corpo
$html_tabela .="<tdoby>";
//inicia e finaliza as linhas
$html_tabela .="<tr>";
$html_tabela .="</tr>";
//inicia colunas
$html_tabela .= getColunasTabela();


//finaliza o corpo
$html_tabela .="</tdoby>";
$html_tabela .="</table>";


echo $html_tabela;