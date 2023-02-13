<?php

require_once 'conexao.php';

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

