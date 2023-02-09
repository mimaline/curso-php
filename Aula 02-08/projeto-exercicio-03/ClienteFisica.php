<?php

require_once ("Cliente.php");
class ClienteFisica extends Cliente {

    public $cpf;

    public function getPessoa(){
        echo "Nome:" . $this->nome . " Email:" . $this->email
            . " Telefone:" . $this->telefone . " CPF:" . $this->cpf;
    }
}
