<?php 
    require_once "conexao.php";
?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Login</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        // Faz a consulta no banco de dados
        $query = "SELECT * FROM administrador";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $administrador = $stmt->fetchAll();

        // Loop através dos resultados e exibe os dados na tabela
        foreach ($administrador as $administrador) {
            echo "<tr>";
            echo "<td>" . $administrador['id'] . "</td>";
            echo "<td>" . $administrador['login'] . "</td>";
            echo "<td><a href='modificar_usuario.php?id=" . $administrador['id'] . "'>Modificar</a></td>";
            echo "<td><a href='excluir_usuario.php?id=" . $administrador['id'] . "'>Excluir</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
