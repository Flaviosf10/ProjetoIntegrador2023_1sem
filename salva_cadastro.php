<?php
    session_start();
    include("conexao.php");

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "select count(*) as total from administrador where login = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$login]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row["total"] == 1) {
        $_SESSION["usuario_existe"] = true;
        header("Location: cadastro.php");
        exit;
    }

    $sql = "INSERT INTO administrador (login,senha) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$login, $senha]);

    if($stmt->rowCount() > 0){
        $_SESSION["status_cadastro"] = true;
    }

    $conn = null;

    header("Location: cadastro.php");
    exit;
?>
