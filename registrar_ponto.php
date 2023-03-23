<?php

//session_start(); // inicia a sessao

// limpa o buffer   
ob_start();


//definindo um fuso horario padrão para a pagina
date_default_timezone_set("America/Sao_Paulo");

// Gerar com php o horario atual
$horario_atual = date("H:i:s");
//var_dump($horario_atual) ;

// Gerar a data com php no formato que deve ser salvo no BD
$data_entrada = date("Y/m/d");

//incluindo a conexão com o banco de dados
include_once "conexao.php";

//Id do usuario fixo para testar
$id_usuario = 1;

//recuperar o ultimo ponto do usuario
$query_ponto = "SELECT id, saida_almoco,retorno_almoco,saida
                from ponto
                where id_funcionario =:id_funcionario
                order by id desc
                limit 1";

//preparar a query
$result_ponto = $conn->prepare($query_ponto);

//substituir o link da query pelo valor
$result_ponto->bindParam(":id_funcionario",$id_usuario);

//executar a query
$result_ponto->execute();

//verifica se encontrou algum registro no banco de dados
if(($result_ponto) and ($result_ponto->rowCount() != 0 )){
    //realizar a leitura do registro
    $row_ponto = $result_ponto->fetch(PDO::FETCH_ASSOC);
    //var_dump($row_ponto);

    //extrair para imprimir atraves do nome da chave no array
    extract($row_ponto);

    //verifica se o usuario ja bateu o ponto de saida para o almoço 
    if(($saida_almoco == "") or ($saida_almoco == null)){
        //coluna que vai receber o valor
        $col_tipo_registro = "saida_almoco";
        // tipo de registro
        $tipo_registro = "editar";
        // Texto parcial que deve ser apresentado para o usuario
        $text_tipo_registro = "saida do almoco";

    }else if (($retorno_almoco == "") or ($retorno_almoco == null)){ //verifica se o usuario bateu o ponto de retorno do almoço
        //coluna que vai receber o valor
        $col_tipo_registro = "retorno_almoco";
        // tipo de registro
        $tipo_registro = "editar";
        // Texto parcial que deve ser apresentado para o usuario
        $text_tipo_registro = "Retorno do almoço";

    }else if (($saida == "") or ($saida == null)){ //verifica se o usuario bateu o ponto de saida
        //coluna que vai receber o valor
        $col_tipo_registro = "saida";
        // tipo de registro
        $tipo_registro = "editar";
        // Texto parcial que deve ser apresentado para o usuario
        $text_tipo_registro = "Saida do expediente";

    }else { //Criar novo registro no BD com o horario de entrada
        // tipo de registro
        $tipo_registro = "entrada";
        // Texto parcial que deve ser apresentado para o usuario
        $text_tipo_registro = "Entrada de expediente";


}

}else{
     // tipo de registro
     $tipo_registro = "entrada";
     // Texto parcial que deve ser apresentado para o usuario
     $text_tipo_registro = "Entrada de expediente";
}

// verifica o tipo de registro, novo ponto ou editar registro
switch($tipo_registro) {
    //Acessa o case quando deve editar o registro
    case "editar":
        //query para editar no banco de dados
        $query_horario = "update ponto set $col_tipo_registro =:horario_atual
                    Where id=:id
                    limit 1";

        //prepara a query 
        $cad_horario =$conn->prepare($query_horario);
        
        //substituir o link pelo valor
        $cad_horario->bindParam(":horario_atual", $horario_atual);
        $cad_horario->bindParam(":id", $id);
        break;
    case "entrada":
        //query para cadastra no banco de dados
        $query_horario ="insert into ponto (data, entrada,id_funcionario) values (:data,:entrada,:id_funcionario)";

        //prepara a query
        $cad_horario = $conn->prepare($query_horario);

        //substituir o link pelo valor
        $cad_horario->bindParam(":data", $data_entrada);
        $cad_horario->bindParam(":entrada", $horario_atual);
        $cad_horario->bindParam(":id_funcionario", $id_usuario);


    break;
}

//executar a query_horario
$cad_horario->execute();

//acessar o if quando cadastrar com sucesso
if($cad_horario->rowcount()){
    $_SESSION["msg"] =  "<p>Horario de $text_tipo_registro cadastrado com sucesso</p>";
    // header("Location: index.php");
}else{
    $_SESSION["msg"] =  "<p>Horario de $text_tipo_registro não cadastrado com sucesso</p>";
    // header("Location: index.php");

}

?>