<?php

$enunciado = 'Criar uma consulta de clientes igual a que acabamos de fazer.
<br>
    Para isso, no arquivo "conexao.php", adicione antes do "return $pdo", o trecho de codigo abaixo:<br>
<code>
    <i>
        $query = "CREATE TABLE IF NOT EXISTS cliente (cliente_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome TEXT, telefone TEXT, email TEXT, cidade TEXT)";
        <br>
        $this->pdoConection->exec($query);
    </i>
</code>
<br>
A classe deve ficar como abaixo:<br>
<code>
    function getConexao(){
    
        try {
            $pdo = new PDO(\'sqlite:db/contato.sqlite3\');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    
        $query = "CREATE TABLE IF NOT EXISTS contato (contato_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome TEXT, sobrenome TEXT, endereco TEXT, telefone TEXT, email TEXT, nascimento TEXT)";
        $pdo->exec($query);
    
        $query = "CREATE TABLE IF NOT EXISTS cliente (cliente_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome TEXT, telefone TEXT, email TEXT, cidade TEXT)";
        $pdo->exec($query);
    
        return $pdo;
    }
</code>';

echo $enunciado;

exit;