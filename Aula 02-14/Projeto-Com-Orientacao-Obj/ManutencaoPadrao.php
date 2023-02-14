<?php

require_once 'conexao.php';

abstract class ManutencaoPadrao {
    // protected abstract function executaConsulta();
    protected abstract function executaInclusao();
    protected abstract function executaAlteracao();
    protected abstract function buscaDadosAlteracao();
    protected abstract function getNomeTabela();
    protected abstract function getNomeColunaChave();
    protected abstract function getDadosFromBancoDados();

    public function __construct(){
        $this->processaDados();
    }

    protected function executaExclusao(){
        $registro = json_decode($_POST[$this->getNomeTabela()], true);
    
        $chave_id = $registro[$this->getNomeColunaChave()];
        
        $query = "DELETE FROM `" . $this->getNomeTabela() . "` WHERE `" . $this->getNomeColunaChave() . "` = :" . $this->getNomeColunaChave();
    
        // executa dados no banco de dados
    
        /** @var PDO $pdo */
        $pdo = getConexao();
    
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':cliente_id', $chave_id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        $stmt = null;
        $pdo = null;
    }

    protected function executaConsulta(){
        $aDados = $this->getDadosFromBancoDados();
        
        echo json_encode($aDados);
    }

    protected function processaDados() {
        if (isset($_POST["acao"])) {
       $acao = $_POST["acao"];
   
       switch ($acao) {
           case "EXECUTA_CONSULTA":
               $this->executaConsulta();
               break;
           case "EXECUTA_INCLUSAO":
               $this->executaInclusao();
               break;
           case "EXECUTA_ALTERACAO":
            $this->executaAlteracao();
               break;
           case "BUSCA_DADOS_ALTERACAO":
            $this->buscaDadosAlteracao();
               break;
           case "EXECUTA_EXCLUSAO":
            $this->executaExclusao();
               break;
       }
           } else {
       echo json_encode(array("mensagem" => "Funcao invalida!")); }
   }
}