<br>
<!--CONTAINER-->
<div class="container">
<div class="row align-items-center justify-content-center">
<div class="formulario col-lg-4 p-4 bg-white">
<!--CABECALHO-->
<header>
    <h4>Empresa</h4>
</header>
<!--CODIGO ATUALIZAR-->
<?php
    $id = strip_tags( mysqli_real_escape_string($conexao,$_POST["id"])); 
    $nomerazaosocial = strip_tags( mysqli_real_escape_string($conexao,$_POST["nomerazaosocial"])); 
    $nomefantasia = strip_tags( mysqli_real_escape_string($conexao,$_POST["nomefantasia"])); 
    $cnpj = strip_tags( mysqli_real_escape_string($conexao,$_POST["cnpj"])); 
    $dataabertura = strip_tags( mysqli_real_escape_string($conexao,$_POST["dataabertura"]));  
    $cep = strip_tags( mysqli_real_escape_string($conexao,$_POST["cep"])); 
    $endereco = strip_tags( mysqli_real_escape_string($conexao,$_POST["endereco"])); 
    $numero = strip_tags( mysqli_real_escape_string($conexao,$_POST["numero"])); 
    $complemento = strip_tags( mysqli_real_escape_string($conexao,$_POST["complemento"])); 
    $bairro = strip_tags( mysqli_real_escape_string($conexao,$_POST["bairro"])); 
    $cidade = strip_tags( mysqli_real_escape_string($conexao,$_POST["cidade"])); 
    $estado = strip_tags( mysqli_real_escape_string($conexao,$_POST["estado"])); 
    $telfixo = strip_tags( mysqli_real_escape_string($conexao,$_POST["telfixo"])); 
    $telcelular = strip_tags( mysqli_real_escape_string($conexao,$_POST["telcelular"])); 
    $email = strip_tags( mysqli_real_escape_string($conexao,$_POST["email"])); 
    //$datacadastro = strip_tags( mysqli_real_escape_string($conexao,$_POST["datacadastro"])); 
    //$dataalteracao = strip_tags( mysqli_real_escape_string($conexao,$_POST["dataalteracao"]));
    
    //BUSCA O ARQUIVO CONEXAO
    require_once("db/conexao.php");
    //CONDICOES
    if (!empty($id)) {//VALIDAR O ID
        //ATUALIZA NO BANCO
        $query = "UPDATE empresa SET
        nomerazaosocial = '{$nomerazaosocial}',
        nomefantasia = '{$nomefantasia}',
        cnpj = '{$cnpj}',
        dataabertura = '{$dataabertura}',
        cep = '{$cep}', 
        endereco = '{$endereco}', 
        numero = '{$numero}', 
        complemento = '{$complemento}', 
        bairro = '{$bairro}',
        cidade = '{$cidade}', 
        estado = '{$estado}', 
        telfixo = '{$telfixo}', 
        telcelular = '{$telcelular}', 
        email = '{$email}',
        dataalteracao = now()
        WHERE id = '{$id}'";
        mysqli_query($conexao,$query) or die("Erro ao executar a consulta. " . mysqli_error($conexao));
        //MENSAGEM
        echo "<h5><span style='color:green';>Registro atualizado com sucesso!</span></h5><br>";  
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=empresalistar'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";      
        //echo "<h5><a href='inicio.php?menuop=empresalistar'>Voltar</a></h5>";     
    }else {    
        //MENSAGEM    
        echo "<h5><span style='color:red';>Erro: Registro não atualizado!</span></h5><br>";  
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=empresalistar'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";      
        //echo "<h5><a href='inicio.php?menuop=empresalistar'>Voltar</a></h5>"; 
    }     
?>
</div>
</div>
</div>