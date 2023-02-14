<?php

require_once 'conexao.php';

abstract class ConsultaPadrao {
    
    protected abstract function getModalDados();
    protected abstract function getCabecalhoTabela();
    protected abstract function getColunasTabela();

    protected function getNomeTabelaDB() {
        return "Nome Tabela Inválido!";
    }

    protected function getDados(){
        /** @var PDO $pdo */
        $pdo = getConexao();
    
        $query = "SELECT * FROM `" . $this->getNomeTabelaDB() . "`";
    
        $stmt = $pdo->prepare($query);
    
        $stmt->execute();
    
        // percorrer os dados e colocar num array
        $aDados = array();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $aDados[] = $result;
        }
    
        return $aDados;
    }

    protected function carregaCabecalho(){
        $html = '<!DOCTYPE html>
                <html lang="pt-BR">
                
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="preconnect" href="https://fonts.gstatic.com">
                    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,200;1,800&display=swap"
                          rel="stylesheet">
                
                    <link rel="stylesheet" href="css/main.css">
                    <link rel="stylesheet" href="css/button.css">
                    <link rel="stylesheet" href="css/records.css">
                    <link rel="stylesheet" href="css/modal.css">
    
                    <script src="js/jquery.min.js" defer></script>
                    <script src="js/' . $this->getNomeTabelaDB() . '.js" defer></script>
                    <script src="js/main.js" defer></script>
                
                    <title>' . ucfirst($this->getNomeTabelaDB()) . '</title>
                </head>
                <body>';
    
        return $html;
    }

    protected function carregaDados(){
        $html_tabela = '<hr style="margin-top=30px">';
        $html_tabela .= $this->carregaCabecalho();

        $html_tabela .= "<header>
                        <h1 class=\"header-title\"> " . ucfirst($this->getNomeTabelaDB()) . "</h1>
                         </header>";
    
        $html_tabela .= '<hr>';
    
        $html_tabela .= $this->getAcoesInclusao();
    
        // Lista de Contatos em HTML com os dados do banco de dados(tabela html)
        $html_tabela .= "<table border='1' id=\"tableDados\">";
    
        // $html_tabela .= "<caption><h1>Clientes</h1></caption>";
    
        $html_tabela .= "<thead>";
        // iniciando linha
        $html_tabela .= "    <tr>";
    
        // colunas cabecalho
        $html_tabela .= $this->getCabecalhoTabela();
    
        // fechando linha
        $html_tabela .= "    </tr>";
        $html_tabela .= "</thead>";
    
        // dados do corpo da tabela
        $html_tabela .= "<tbody>";
    
        // Colunas
        $html_tabela .= $this->getColunasTabela();
    
        $html_tabela .= "</tbody>";
    
        $html_tabela .= "</table>";
        
        $html_tabela .= $this->getModalDados();
        
        echo $html_tabela;
    }

    protected function getAcoesInclusao(){
        return '<section class="acoes">
                    <button type="button" class="button blue mobile" id="incluirDados">Incluir</button>
                    <button type="button" class="button green" id="consultarDados">Consultar</button>
                    <button type="button" class="button red" id="limparDados">Limpar Consulta</button>
                </section>';
    }
}