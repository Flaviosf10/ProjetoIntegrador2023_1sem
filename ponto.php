<?php
require_once "conexao.php" ;

//Consulta SQL para selecionar todos os registros da tabela ponto
$query = "SELECT * FROM ponto";

//Prepara a consulta
$stmt = $conn->prepare($query);

//Executa a consulta
$stmt->execute();

//Verifica se a consulta retornou algum resultado
if ($stmt->rowCount() > 0) {
    // Inicia a construção da tabela HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Funcionário</th><th>Data</th><th>Entrada</th><th>Saida almoço</th><th>Retorno Almoço</th><th>Saida</th></tr>";

    // Loop através dos resultados da consulta
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Exibe os dados de cada registro na tabela HTML
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['id_funcionario'] . "</td>";
        echo "<td>" . $row['data'] . "</td>";
        echo "<td>" . $row['entrada'] . "</td>";
        echo "<td>" . $row['saida_almoco'] . "</td>";
        echo "<td>" . $row['retorno_almoco'] . "</td>";
        echo "<td>" . $row['saida'] . "</td>";
        
        echo "</tr>";
    }

    // Finaliza a construção da tabela HTML
    echo "</table>";
} else {
    // Caso a consulta não tenha retornado nenhum resultado
    echo "Nenhum registro encontrado.";
}