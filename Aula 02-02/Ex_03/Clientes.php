<?php

class Cliente {
    
    //Atributos
    public $nome;
    public $email;
    public $tel;

    public function insereInfos($nome, $email, $tel) {
        $this->nome  = $nome;
        $this->email = $email;
        $this->tel   = $tel;
    }

    public function exibir($nome, $email, $tel) {
       echo 'Nome: ' . $nome . '<br>';
       echo 'E-mail: ' . $email . '<br>';
       echo 'Tel: ' . $tel . '<br>';
    }
}