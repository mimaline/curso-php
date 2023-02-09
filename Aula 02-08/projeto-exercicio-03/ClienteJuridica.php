<?php

require_once ("Cliente.php");
class ClienteJuridica extends Cliente {

    public $cnpj;

    public function getPessoa(){
        echo "Nome:" . $this->nome . " Email:" . $this->email
            . " Telefone:" . $this->telefone . " Cnpj:" . $this->cnpj;
    }
}
