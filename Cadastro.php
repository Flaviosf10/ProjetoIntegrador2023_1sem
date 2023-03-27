<?php
session_start();

?>
<!DOCTYPE html> 
<html>
<head> 
    <title>Sistema - PONTO</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="cssexterno.css"> <!-- CSS externo-->
    
    

</head>
<body>  
        
        <div class="marca_ponto"> 
          <div class="ponto_centralizado">  
            <?php
                if(isset($_SESSION["status_cadastro"]) && $_SESSION["status_cadastro"]):
            ?>
            <div>
                <p>Cadastro efetuado</p>
                <p>Faça login informando o seu usuario e senha <a href="paginainicial.php">Aqui</a></p>
            </div>
            <?php
            endif;
            unset($_SESSION['status_cadastro']);
            ?>

            <?php
                if(isset($_SESSION["usuario_existe"]) && $_SESSION["usuario_existe"]):
            ?>
            <div>
                <p>O usuario escolhido ja existe. Informe outro e tente novamente</p>
            </div>
            <?php
            endif;
            unset($_SESSION['usuario_existe']);
            ?>


            <form method="post" action="salva_cadastro.php">
                <div class="cadastro">
                    <div>
                        <input name="login" type="text" placeholder="nome" autofocus>
                    </div>
                </div>

                <div class="cadastro">
                    <div>
                        <input name="senha" type="password" placeholder="senha">
                    </div>
                </div>
                <button type="submit">Cadastrar</button>
            
                

            </form>
          
          </div>
          </div>

    
    
    
</body>


</html>