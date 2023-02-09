<?php

echo 'Aula 09/02/2023';

require_once 'conexao.php';

function getDados(){
    //** @var PDO $pdo */
    $pdo = getConexao();
    $query = "SELECT * FROM `contato`";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    //percorrer dados e colocar num array
    $aDados = array();
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $aDados[] = $result;
        }
    return $aDados;
}

function getColunasTabela(){
 
    $html_colunas_tabela    = '';
    $aDados = getDados();

    if(count($aDados)) {
        foreach ($aDados as $aContato) {
            //inicia linha
            $html_colunas_tabela    .="<tr>";
            //pega dados
            $contato_id = $aContato["contato_id"];
            $nome = $aContato["nome"];
            $sobrenome = $aContato["sobrenome"];
            $endereco = $aContato["endereco"];
            $telefone = $aContato["telefone"];
            $email = $aContato["email"];
            $nascimento = $aContato["nascimento"];

            //colunas
            $html_colunas_tabela    .="<td> $contato_id </td>";
            $html_colunas_tabela    .="<td> $nome </td>";
            $html_colunas_tabela    .="<td>$sobrenome</td>";
            $html_colunas_tabela    .="<td> $endereco</td>";
            $html_colunas_tabela    .="<td>$telefone</td>";
            $html_colunas_tabela    .="<td>$email</td>";
            $html_colunas_tabela    .="<td> $nascimento</td>";
            
            //finaliza linha
            $html_colunas_tabela    .="</tr>";
        }
    } else {
        $html_colunas_tabela    = "<tr><td colspan=\"7\">Sem dados para exibir</td></tr>"; 
    }
    
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
$html_tabela .="<tbody>";
//inicia e finaliza as linhas
$html_tabela .="<tr>";
$html_tabela .="</tr>";
//inicia colunas
$html_tabela .= getColunasTabela();


//finaliza o corpo
$html_tabela .="</tbody>";
$html_tabela .="</table>";


echo $html_tabela;