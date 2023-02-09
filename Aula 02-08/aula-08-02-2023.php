<?php

class ClientePadrao {

    protected $nome;
    private $email;
    private $telefone;

    /**
     * @param $nome
     * @param $email
     * @param $telefone
     */
    public function __construct($nome, $email, $telefone)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
    }


    public function exibir(){
        echo "Nome:" . $this->nome . " Email:" . $this->email . " Telefone:" . $this->telefone;

        return true;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return Cliente
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Cliente
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     * @return Cliente
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

//    public function __destruct() {
//        echo "<br>Destruindo objeto.<br>";
//    }
}

class ClienteFisica extends ClientePadrao {

    public static $TOKEN_API = "DA,DOAMCOSAMC´SC";


    public function __construct($nome, $email, $telefone)
    {
        parent::__construct($nome, $email, $telefone);
    }

    public static function calculaImpostoRenda(){
        echo "Calculando imposto...";

        return 0;
    }

    public function exibir(){
        $oDadosPai = parent::exibir();

        echo "<br>Acessando classe filha";

        echo "<br>Filha->Nome:" . $this->getNome() . " Email:" . $this->getEmail() . " Telefone:" . $this->getTelefone();
    }

    public static function exibiDadosEstatico(){
        echo "exibindo dados atraves de funcao estatica...";
        return true;
    }

}

$oCliente = new ClienteFisica("Maria", "maria@email.com", "(47)98854-4848");
$oCliente->exibir();

