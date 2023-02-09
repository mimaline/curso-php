<?php

class Cliente {

    public $nome;
    public $email;
    public $telefone;
    public $cpf;

    public function exibir(){
        echo "Nome:" . $this->nome . " Email:" . $this->email . " Telefone:" . $this->telefone ;
    }
}
