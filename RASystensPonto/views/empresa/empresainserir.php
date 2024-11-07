<br>
<!--CONTAINER-->
<div class="container">
<div class="row align-items-center justify-content-center">
<div class="formulario col-lg-4 p-4 bg-white">
<!--CABECALHO-->
<header>
    <h4>Empresa</h4>
</header>
<!--CODIGO INSERIR-->
<?php
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
    //FAZ O SELECT E VERIFICA SE JA TEM CADASTRO NO BANCO
    $queryempresa = "SELECT * FROM empresa";
    $buscaempresa = mysqli_query($conexao, $queryempresa);
    $verificaempresa = mysqli_num_rows($buscaempresa);
    //FAZ O SELECT E VERIFICA SE O CNPJ JA ESTA CADASTRADO NO BANCO
    $querycnpj = "SELECT cnpj FROM empresa WHERE cnpj = '$cnpj' ";
    $buscacnpj = mysqli_query($conexao, $querycnpj);
    $verificacnpj = mysqli_num_rows($buscacnpj);

    if ($verificaempresa > 0){//VERIFICA SE JA TEM UMA EMPRESA CADASTRADA
        echo "<h5><span style='color:red';>Registro não inserido.<br>Já tem uma empresa cadastrada!</span></h5><br>";  
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=empresalistar'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";     
        //echo "<h5><a href='inicio.php?menuop=empresalistar'>Voltar</a></h5>";  
    }elseif(!empty($verificacnpj)){//VERIFICA SE JA TEM UM CNPJ CADASTRADO
        echo "<h5><span style='color:red';>Registro não inserido.<br>CNPJ já cadastrado!</span></h5><br>"; 
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=empresalistar'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";      
        //echo "<h5><a href='inicio.php?menuop=empresalistar'>Voltar</a></h5>";  
    }else{
        //INSERIR NO BANCO
        $query = "INSERT INTO empresa 
            (nomerazaosocial, nomefantasia, cnpj, dataabertura,
            cep, endereco, numero, complemento, bairro,
            cidade, estado, telfixo, telcelular, email,
            datacadastro, dataalteracao
        )
        VALUES (
            '{$nomerazaosocial}', '{$nomefantasia}', '{$cnpj}', '{$dataabertura}', 
            '{$cep}', '{$endereco}', '{$numero}', '{$complemento}', '{$bairro}', 
            '{$cidade}', '{$estado}', '{$telfixo}', '{$telcelular}', '{$email}', 
            now(), now()
            )    
        ";
        mysqli_query($conexao,$query) or die("Erro ao executar a consulta. " . mysqli_error($conexao));
        //MENSAGEM
        echo "<h5><span style='color:green';>Registro inserido com sucesso!</span></h5><br>";  
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=empresalistar'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";     
        //echo "<h5><a href='inicio.php?menuop=empresalistar'>Voltar</a></h5>";  
    } 
?>
</div>
</div>
</div>