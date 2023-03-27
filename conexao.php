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
    } catch(PDOException $err) {
        echo "Erro: conexão com o banco de dados não realizado erro gerado" . $err->getMessage();
    }

    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the login credentials from the form
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        // Consulta SQL para verificar se o usuário e a senha são válidos
        $query = "SELECT * FROM administrador WHERE login = :login AND senha = :senha";

        // Prepara a consulta
        $stmt = $conn->prepare($query);

        // Executa a consulta, substituindo os placeholders com as variáveis
        $stmt->execute(array(':login' => $login, ':senha' => $senha));

        // Verifica se a consulta retornou alguma linha (usuário e senha válidos)
        if ($stmt->rowCount() > 0) {
            // Set the user's session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $login;

            // Redirecionar para a pagina index.php
            header("location: index.php");
        } else {
            // APRESENTA UM ERRO CASO AS CREDENCIAIS ESTEJAM INCORRETAS
            $error = "Login Inválido.";
        }
    }
?>
