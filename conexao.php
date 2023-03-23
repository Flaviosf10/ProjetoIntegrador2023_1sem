<?php 

    //inicio da conexao com o banco de dados utilizando PDO
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $dbname = "cartao_ponto";
    $port = 3306;

    try {
        //conexao com o banco
        $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
        //echo "conexão com o banco de dados realizado com sucesso";
    }catch(PDOException $err) {
        echo "Erro: conexão com o banco de dados não realizado erro gerado" . $err->getMessage();
    }



?>