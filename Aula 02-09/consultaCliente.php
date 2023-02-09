<?php

require_once 'conexao.php';

function getData() {
        //** @var PDO $pdo */
        $pdo = getConexao();
        $query = "SELECT * FROM `cliente`";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        //percorrer dados e colocar num array
        $aData = array();
            while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                $aData[] = $result;
            }
        return $aData;
    }

function getColumns() {
    $table_column   = '';
    $aData          = getData();

    if (count($aData)) {
        foreach ($aData as $aClient) {
            $table_column .= "<tr>";
            // pegar os dados do cliente
            $client_id  = $aClient["cliente_id"];
            $name       = $aClient["nome"];
            $phone      = $aClient["telefone"];
            $email      = $aClient["email"];
            $city       = $aClient["cidade"];
            
            $table_column .= "<td> $client_id</td>";
            $table_column .= "<td> $name</td>";
            $table_column .= "<td> $phone</td>";
            $table_column .= "<td> $email</td>";
            $table_column .= "<td> $city</td>";
            
            $table_column .= "</tr>";
        }
    } else {
        $table_column = "<tr><td colspan=\"5\">Sem dados para exibir neste momento.</td></tr>";
    }

    return $table_column;
}

$table = "<table border='1'>";
$table .= "<thead>";
$table .= "<tr>";

$table .= "<th>Id</th>";
$table .= "<th>Nome</th>";
$table .= "<th>Telefone</th>";
$table .= "<th>Email</th>";
$table .= "<th>Cidade</th>";

$table .= "</tr>";
$table .= "</thead>";

$table .= "<tbody>";
$table .= "<tr>";
$table .= "</tr>";

$table .= getColumns();

$table .= "</tbody>";
$table .= "</table>";

echo $table;