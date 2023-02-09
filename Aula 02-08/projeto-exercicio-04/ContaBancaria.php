<?php

class ContaBancaria {

    public $Cliente;
    public $datacriacao;
    public $saldoinicial;
    public $saldoatual;
    public $operacoes = [];

    public function __construct($oCliente, $saldoinicial, $datacriacao){
        $this->Cliente = $oCliente;
        $this->saldoinicial = $saldoinicial;
        $this->saldoatual = $saldoinicial;
        $this->datacriacao = $datacriacao;

        // Adiciona os dados no array de operacoes
        $this->operacoes[] = array("operacao" => "Saldo Inicial" , "valor" => $saldoinicial);
    }

    public function getCliente(){
        return $this->Cliente;
    }

    public function sacar($valor_a_sacar){
        if($this->saldoatual > 0 && $this->saldoatual >= $valor_a_sacar){
            $this->saldoatual = $this->saldoatual - $valor_a_sacar;

            // Pega o nome do cliente do objeto 'Cliente'
            $nome_cliente = $this->getCliente()->nome;

            echo "<b>Realizado saque do cliente " . $nome_cliente . " no valor de R$ " . $valor_a_sacar . ". </b>";

            // Adiciona as operacoes no array de operacoes
            $this->operacoes[] = array("operacao" => "Saque" , "valor" => $valor_a_sacar);

            return true;
        }

        echo "<h1>Saldo Insuficiente!Saldo Atual: R$ " . $this->saldoatual . "</h1>";

        return false;
    }

    public function depositar($valor_a_depositar){

        $this->saldoatual = $this->saldoatual + $valor_a_depositar;

        // Pega o nome do cliente do objeto 'Cliente'
        $nome_cliente = $this->getCliente()->nome;

        echo "<b>Realizado depósito para o cliente " . $nome_cliente . " no valor de R$ " . $valor_a_depositar . ". </b>";
        echo "<br>Saldo Atual: R$ " . $this->saldoatual;

        // Adiciona as operacoes no array de operacoes
        $this->operacoes[] = array("operacao" => "Depósito" , "valor" => $valor_a_depositar);
    }

    public function exibeSaldo(){
        $nome_cliente = $this->getCliente()->nome;

        echo "<b>Saldo atual do cliente " . $nome_cliente . " R$ " . $this->saldoatual . ". </b>";
    }

    public function exibeExtrato(){

        $dadosCliente = "<hr><h1>Extrato do Cliente</h1>"
            . " <br>Cliente:<b>" . $this->getCliente()->nome . "</b>"
            . " <br>E-mail:<b>" . $this->getCliente()->email . "</b>"
            . " <br>Telefone:<b>" . $this->getCliente()->telefone. "</b>"
            . " <br>Cpf:<b>" . $this->getCliente()->cpf. "</b>";

        $operacoesCliente = $this->getHTMLOperacoesCliente();

        echo $dadosCliente . "<hr>" . $operacoesCliente;
    }

    protected function getHTMLOperacoesCliente(){
        $html_tabela = "<table border='1'>
            <thead>
                <th>Operação</th>
                <th>Saque</th>
            </thead>
        ";

        // Percorrer as operacoes e adicionar as linhas na tabela
        foreach ($this->operacoes as $aListaOperacao){
             $operacao = $aListaOperacao["operacao"];
             $valor = $aListaOperacao["valor"];

             $html_tabela .="
                <tr>
                    <td>" . $operacao . "</td>
                    <td> R$ " . $valor . "</td>
                </tr>
             ";
        }
        $html_tabela .=" 
            <tr>
                <td>Saldo Atual</td>
                <td> R$ " . $this->saldoatual . "</td>
            </tr>
         </table>";
        return $html_tabela;
    }
}
