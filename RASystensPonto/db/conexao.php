<?php
    //BUSCA O ARQUIVO
    include("config.php");
    //CONEXAO COM O BANCO DE DADOS
    $conexao = mysqli_connect(SERVIDOR,USUARIO,SENHA,BANCO) 
    or die("Erro na conexão com o servidor! Erro: " . mysqli_connect_error());
?>
