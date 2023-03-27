<?php
    require_once "conexao.php";

    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_POST['id']) && isset($_POST['login'])) {
        $id = $_POST['id'];
        $login = $_POST['login'];

        $query = "UPDATE administrador SET login = :login WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header('Location: paginainicial.php');
        exit();
    } else if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM administrador WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $administrador = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location: paginainicial.php');
        exit();
    }
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Modificar usuário</title>
    </head>
    <body>
        <form action="modificar_usuario.php" method="post">
            <input type="hidden" name="id" value="<?php echo $administrador['id'] ?>">
            <label for="login">Login:</label>
            <input type="text" name="login" value="<?php echo $administrador['login'] ?>">
            <input type="submit" value="Salvar">
        </form>
    </body>
</html>
