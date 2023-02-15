<?php

function getDadosFromBancoDados(){

    require_once('conexao.php');
    /** @var PDO $pdo */
    $pdo = getConexao();

    $query = "select * from `usuario` WHERE email like '%" . $email . "%'";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $aDados = array();
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $aDados[] = $result;
    }

    $stmt = null;
    $pdo = null;

    return $aDados;
}

$logado = isset($_GET["login"]) ? $_GET["login"] : 999;
if($logado == "USUARIO_LOGADO"){
    // redirecionar para pagina de login
    header("Location: Home.php?login=USUARIO_LOGADO");
} else if ($logado == "LOGAR_SISTEMA"){

    require_once ("Bcrypt.php");
    $senha_informada_usuario = $_POST["senha"];

    $senha_banco_dados = '123456';
    $hash = Bcrypt::hash($senha_banco_dados);
    if (Bcrypt::check($senha_informada_usuario, $hash)) {
        $retorno = array("login" => true, "mensagem" => "Usuario logado com sucesso!");
    } else {
        $retorno = array("login" => false, "mensagem" => "Usuario/Senha não confere");
    }

    echo json_encode($retorno);
} else {
    require_once ("login_sistema.html");
}

// acoes adicionadas
// Sair
// Login.php, alterando

