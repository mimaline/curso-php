<?php

class Cliente {

    //Atributos:
    public $nome;
    public $email;
    public $tel;

    // Metodos:
    public function getNome() {
       return $this->nome;
    }    

    public function getEmail() {
       return $this->email;
    }    
    
    public function getTelefone() {
       return $this->tel;
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