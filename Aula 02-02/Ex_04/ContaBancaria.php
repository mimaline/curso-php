<?php

require_once("Cliente.php");

class ContaBancaria extends Cliente{

    public $Cliente;
    public $dataCriacao;
    public $saldoInicial;
    public $saldoAtual;
    public $operacoes = array();
  

    public function __construct($oCliente, $saldoInicial, $dataCriacao){
        $this->Cliente = $oCliente;
        $this->dataCriacao = date('Y-m-d');
        $this->saldoInicial = $saldoInicial;
        $this->saldoAtual = $saldoInicial;
    }

    public function getCliente(){
        return $this->Cliente;
    }

    public function sacar($valor) {
        $this->saldoAtual -= $valor;
        $operacao = "Realizado saque do cliente ".$this->cliente->getNome()." no valor de R$ ".$valor.".";
        $this->operacoes[] = $operacao;
        echo $operacao." Saldo atual: R$ ".$this->saldoAtual.".";
    }

    public function depositar($valor) {
        $this->saldoAtual += $valor;
        $operacao = "Realizado depósito para o cliente ".$this->cliente->getNome()." no valor de R$ ".$valor.".";
        $this->operacoes[] = $operacao;
        echo $operacao." Saldo atual: R$ ".$this->saldoAtual.".";
    }

    public function exibeSaldo() {
        echo "Saldo atual do cliente ".$this->cliente->getNome()." R$ ".$this->saldoAtual.".";
    }

    public function exibeExtrato() {
        echo "Cliente: ".$this->cliente->getNome()."\n";
        echo "E-mail: ".$this->cliente->getEmail()."\n";
        echo "Telefone: ".$this->cliente->getTelefone()."\n";
        // echo "CPF/CNPJ: ".$this->cliente->getCpfCnpj()."\n\n";
    
        foreach ($this->operacoes as $operacao) {
          echo $operacao."\n";
        }
    }

}

$oCliente = new Cliente();
$oCliente->nome = 'Joao';

$oContaBancaria = new ContaBancaria($oCliente);

echo 'Nome cliente:' . $oContaBancaria->getCliente()->getNome();