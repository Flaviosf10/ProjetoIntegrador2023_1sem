<?php 
include("conexao.php");

if(isset($_POST["username"]) || isset($_POST["password"])) {

    if(strlen($_POST["username"]) == 0 )  {
        echo "Preencha seu nome";

    } else if($_POST["password"] == 0 ) {
        echo "Preencha sua senha";
    } else {

        $username = $mysqli->real_escape_string($_POST["username"]);
        $password = $mysqli->real_escape_string($_POST["password"]);

        $sql_code = "SELECT * FROM administrador WHERE login = '$username' and senha = '$password'";
        $sql_query = $mysqli->query($sql_code) or die("falha na execução do codigo SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $administrador = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_star();
            }

            $_SESSION["id"] = $administrador["id"];
            $_SESSION["login"] = $administrador["login"];


            header("Location: index.php");


        } else {
            echo "Falha ao logar! login e senha incorretos";
        }
    }
} 

?>

<!DOCTYPE html>
<html>

<head>
    <title>Sistema - PONTO</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="cssexterno.css"> <!-- CSS externo-->


</head>

<body class="paginainicial">

    <!-- Div do conteudo centralizado-->
    <div class="centralizado">
        <div class="row">
            <form class="form_login">
                <div class="row">
                    <label for="username">
                        <h2 class="login">Login</h2>
                    </label>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input class=texto type="text" id="username" name="username" placeholder="Usuário">
                    </div>
                    <div class="col-md-6">

                        <input class="senha" type="password" id="password" name="password" placeholder="Senha">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <button class="entra" type="submit">Logar</button>
                    </div>
                    <div id="inferior">
                        <button class="cadastro" type="button" onclick="window.location.href='administrador.php'">Administrador</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</body>


</html>