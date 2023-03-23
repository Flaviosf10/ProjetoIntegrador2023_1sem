<?php 

// session_start(); // iniciar a sessao

//definindo um fuso horario padrão para a pagina
date_default_timezone_set("America/Sao_Paulo")
?>
<!DOCTYPE html> 
<html>
<head> 
    <title>Sistema - PONTO</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="cssexterno.css"> <!-- CSS externo-->
    
    

</head>
<body>  
        <!--criando o cabeçalho-->
        <header class="cabecalho"> 
            <div class="logo">
                <h1 class="pontoh1">Sistema  <span class="vermelho">Ponto</span></h1> 

            </div>
            <div class="menu">
                <button class="menu-button" onclick="toggleMenu()">Menu</button>
                <div class="menu-content">
                  <a class="opcao" href="index.html">Home</a>
                  <a class="opcao" href="consulta.html">Consulta Ponto</a>
                  <a class="opcao" href="">Teste</a>
                  <a class="opcao" href="paginainicial.html">Sair</a>
                </div>
              </div>
        </header>


        <div class="marca_ponto"> 
          <div class="ponto_centralizado">
            <h1 class="marca_nome">Ranieri Silva Amorim</h1>
            <h2 class="marca_funcionario">Funcionario</h2> 
            <p id="horario"><?php echo date("d/m/Y  H:i:s"); ?>  </p>      
               

            <button onclick="mostramarcacao()" class="botao_ponto"  >Marca ponto</button>
           
          
          </div>
          </div>

          
    

    <!-- codigos JS para serem executados depois de recarregar o HTML -->
    <script src="horario.js"></script>
    <script src="javascriptmenu.js"></script>
    
    
    
</body>


</html>