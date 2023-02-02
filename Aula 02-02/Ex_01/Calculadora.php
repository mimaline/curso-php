<?php

class Calculadora {
    public $igualdade;

    public function __construct() {
        $this->igualdade = 0;
    }

    public function soma ($valor1, $valor2){
        $this->igualdade = $valor1 + $valor2;
        // return $igualdade;
    }
    public function subtracao ($valor1, $valor2){
        $this->igualdade = $valor1 - $valor2;
        // return $igualdade;
    }
    public function divisao ($valor1, $valor2){
        $this->igualdade = $valor1 / $valor2;
        // return $igualdade;
    }
    public function multiplicacao ($valor1, $valor2){
        $this->igualdade = $valor1 * $valor2;
        // return $igualdade;
    }

    public function fatorial ($valor1) {
        $this->igualdade = 1;
        for ($i = 1; $i <= $valor1; $i++) {
            $this->igualdade *= $i;
        }
    }

    public function getIgualdade() {
        return $this-> igualdade;
    }
}