<?php

require_once 'conexao.php';

function buscaDadosAlteracao(){
    $registro = json_decode($_POST["cliente"], true);
    
    $cliente_id = $registro["cliente_id"];
    
    $aDados = getDadosFromBancoDados($cliente_id);
    
    echo json_encode($aDados);
}

function executaExclusao(){
    $registro = json_decode($_POST["cliente"], true);

    $cliente_id = $registro["cliente_id"];
    
    $query = "DELETE FROM `cliente` WHERE `cliente_id` = :cliente_id";

    // executa dados no banco de dados

    /** @var PDO $pdo */
    $pdo = getConexao();

    $stmt = $pdo->prepare($query);
    
    $stmt->bindParam(':cliente_id', $cliente_id, PDO::PARAM_INT);
    
    $stmt->execute();
    
    $stmt = null;
    $pdo = null;
}

function executaConsulta() {
    $aDados = getDadosFromBancoDados();

    echo json_encode($aDados);
}

function executaAlteracao() {
    $registro = json_decode($_POST["cliente"], true);

    /** @var PDO $pdo */
    $pdo = getConexao();
    
    $query = "UPDATE `cliente` SET `nome` = :nome, `telefone` = :telefone, `email` = :email, `cidade` = :cidade WHERE `cliente_id` = :cliente_id";

    $stmt = $pdo->prepare($query);
    
    $stmt->bindParam(':nome'      , $registro['nome']);
    $stmt->bindParam(':telefone'  , $registro['telefone']);
    $stmt->bindParam(':email'     , $registro['email']);
    $stmt->bindParam(':cidade', $registro['cidade']);
    $stmt->bindParam(':cliente_id', $registro['cliente_id']);

    $stmt->execute();
    
    $stmt = null;
    $pdo = null;
    
    echo json_encode($registro);
}

function executaInclusao(){

    $registro = json_decode($_POST["cliente"], true);
    
    require_once 'conexao.php';
    /** @var PDO $pdo */
    $pdo = getConexao();
    
    $query = "INSERT INTO `cliente` (nome, telefone, email, cidade)
    VALUES(:nome, :telefone, :email, :cidade)";
    
    $stmt = $pdo->prepare($query);
    
    $stmt->bindParam(':nome'      , $registro['nome']);
    $stmt->bindParam(':telefone'  , $registro['telefone']);
    $stmt->bindParam(':email'     , $registro['email']);
    $stmt->bindParam(':cidade', $registro['cidade']);
    
    $stmt->execute();
    
    $stmt = null;
    $pdo = null;
    
    echo json_encode($registro);
}

function getDadosFromBancoDados($cliente_id = false) {
    /** @var PDO $pdo */
    $pdo = getConexao();
    
    $query = "SELECT * FROM `cliente`";
    if($cliente_id){
        $query = "SELECT * FROM `cliente` WHERE cliente_id = $cliente_id";
    }
    
    $stmt = $pdo->prepare($query);
    
    $stmt->execute();
    
    // percorrer os dados e coloca num array
    $aDados = array();
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $aDados[] = $result;
        if($cliente_id){
            $aDados = $result;
        }
    }
    
    $stmt = null;
    $pdo = null;
    
    return $aDados;
}

if (isset($_POST["acao"])) {
    $acao = $_POST["acao"];

    switch ($acao) {
        case "EXECUTA_CONSULTA":
            executaConsulta();
            break;
        case "EXECUTA_INCLUSAO":
            executaInclusao();
            break;
        case "EXECUTA_ALTERACAO":
            executaAlteracao();
            break;
        case "BUSCA_DADOS_ALTERACAO":
            buscaDadosAlteracao();
            break;
        case "EXECUTA_EXCLUSAO":
            executaExclusao();
            break;
    }
} else {
    echo json_encode(array("mensagem" => "Funcao invalida!"));
}

