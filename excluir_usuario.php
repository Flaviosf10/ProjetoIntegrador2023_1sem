<?php
require_once "conexao.php";

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // Recupera o ID do usuário da URL
        $id = $_GET['id'];

        // Verifica se o ID é válido
        if (!is_numeric($id)) {
            $error = "ID inválido.";
        } else {
            // Prepara a consulta SQL para excluir o usuário pelo ID
            $query = "DELETE FROM administrador WHERE id = :id";

            // Prepara a consulta
            $stmt = $conn->prepare($query);

            // Executa a consulta, substituindo o placeholder com o ID
            $stmt->execute(array(':id' => $id));

            // Verifica se a consulta foi executada com sucesso
            if ($stmt->rowCount() > 0) {
                // Exclusão realizada com sucesso
                header("location: API.php");
            } else {
                // Falha na exclusão
                $error = "Falha ao excluir usuário.";
            }
        }
    } else {
        // ID não informado
        $error = "ID não informado.";
    }

?>
