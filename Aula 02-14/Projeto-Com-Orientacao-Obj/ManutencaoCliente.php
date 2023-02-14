<?php

require_once 'ManutencaoPadrao.php';

class ManutencaoCliente extends ManutencaoPadrao{

    protected function getNomeTabela()
    {
        return 'cliente';
    }

    protected function getNomeColunaChave()
    {
        return 'cliente_id';
    }

    protected function buscaDadosAlteracao(){
    $registro = json_decode($_POST["cliente"], true);
    
    $cliente_id = $registro["cliente_id"];
    
    $aDados = $this->getDadosFromBancoDados($cliente_id);
    
    echo json_encode($aDados);
}

    protected function executaAlteracao() {
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

    protected function executaInclusao(){

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

    protected function getDadosFromBancoDados($chave_id = false) {
    /** @var PDO $pdo */
    $pdo = getConexao();
    
    $query = "SELECT * FROM `cliente`";
    if($chave_id){
        $query = "SELECT * FROM `cliente` WHERE cliente_id = $chave_id";
    }
    
    $stmt = $pdo->prepare($query);
    
    $stmt->execute();
    
    // percorrer os dados e coloca num array
    $aDados = array();
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $aDados[] = $result;
        if($chave_id){
            $aDados = $result;
        }
    }
    
    $stmt = null;
    $pdo = null;
    
    return $aDados;
}

}