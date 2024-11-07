<?php
    //INCLUI A CONEXAO DO BANCO
    include("conexao.php");
    session_start(); //CHAMA A SESSAO
    session_unset(); //DESTROI AS VARIAVEIS
    session_destroy(); //DESTROI A SESSAO
    header('Location: index.php'); //DIRECIONA PARA PAGINA LOGIN
    exit();
?>