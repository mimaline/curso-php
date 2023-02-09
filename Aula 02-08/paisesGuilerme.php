<?php


class Pais {
    public $nome;
    public $dimensao;
}

class Continente {
    private $nome_continente;
    private $lista_paises;

    public function adicionaPais($oPais){
        $this->lista_paises[] = $oPais;
    }

    public function getPaises(){
        return $this->lista_paises;
    }

    public function getMaiorPais(){
        $maiorPais = "";
        foreach ($this->lista_paises as $oPais){
            echo '<br>percorrendo paises';
            if($maiorPais == ""){
                $maiorPais = $oPais;
            }

            if(intval($oPais->dimensao) > intval($maiorPais->dimensao)){
                $maiorPais = $oPais;
            }
        }

        return $maiorPais;
    }

}
$oContinenteAmerica = new Continente();

$oPais = new Pais();
$oPais->nome = "Brasil";
$oPais->dimensao = 50000;

$oContinenteAmerica->adicionaPais($oPais);
$oPais = new Pais();
$oPais->nome = "Bolivia";
$oPais->dimensao = 300;

$oContinenteAmerica->adicionaPais($oPais);
$oPais = new Pais();
$oPais->nome = "Peru";
$oPais->dimensao = 700;

$oContinenteAmerica->adicionaPais($oPais);

echo "<pre>" . print_r($oContinenteAmerica->getPaises(), true) . "</pre>";

echo "<br>Maior Pais:" . json_encode($oContinenteAmerica->getMaiorPais());

