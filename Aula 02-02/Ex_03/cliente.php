<?php

class Cliente {

    //Atributos:
    public $nome;
    public $email;
    public $tel;

    // Metodos:
    public function exibir() {
       echo 'Nome: '     . $this->nome  . '<br>';
       echo 'Email: '    . $this->email . '<br>';
       echo 'Telefone: ' . $this->tel   . '<br>';
    }    
}

class PFisica extends Cliente {
    //Atributo
    public $cpf;

    // Metodos:
    public function getPessoa(){
        return $this->cpf;
    }
}

class PJuridica extends Cliente {
    //Atributo
    public $cnpj;
    
    // Metodos:

    public function getPessoa(){
        return $this->cnpj;
    }
}