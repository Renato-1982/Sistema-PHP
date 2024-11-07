<br>
<!--CONTAINER-->
<div class="container">
<div class="row align-items-center justify-content-center">
<div class="formulario col-lg-4 p-4 bg-white">
<!--CABECALHO-->
<header>
    <h4>Funcionário</h4>
</header>
<!--CODIGO INSERIR-->
<?php
    //$status = strip_tags( mysqli_real_escape_string($conexao,$_POST["status"])); 
    $nome = strip_tags( mysqli_real_escape_string($conexao,$_POST["nome"])); 
    $cpf = strip_tags( mysqli_real_escape_string($conexao,$_POST["cpf"])); 
    $rg = strip_tags( mysqli_real_escape_string($conexao,$_POST["rg"])); 
    $datanascimento = strip_tags( mysqli_real_escape_string($conexao,$_POST["datanascimento"])); 
    $pis = strip_tags( mysqli_real_escape_string($conexao,$_POST["pis"])); 
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
    $cargo = strip_tags( mysqli_real_escape_string($conexao,$_POST["cargo"])); 
    $dataadmissao = strip_tags( mysqli_real_escape_string($conexao,$_POST["dataadmissao"])); 
    //$datarescisao = strip_tags( mysqli_real_escape_string($conexao,$_POST["datarescisao"])); 
    //$datacadastro = strip_tags( mysqli_real_escape_string($conexao,$_POST["datacadastro"])); 
    //$dataalteracao = strip_tags( mysqli_real_escape_string($conexao,$_POST["dataalteracao"])); 
    
    //BUSCA O ARQUIVO CONEXAO
    require_once("db/conexao.php");
    //FAZ O SELECT E VERIFICA SE O CPF JA ESTA CADASTRADO NO BANCO
    $querycpf = "SELECT cpf FROM funcionarios WHERE cpf = '$cpf' ";
    $buscacpf = mysqli_query($conexao, $querycpf);
    $verificacpf = mysqli_num_rows($buscacpf);
    //CONDICOES
    if (!empty($verificacpf)){//VERIFICA SE O CPF JA ESTA CADASTRADO 
        echo "<h5><span style='color:red';>Registro não inserido.<br>CPF já está cadastrado!</span></h5><br>"; 
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=funcionarioscadastrar'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";  
    }else{
        //INSERIR NO BANCO
        $query = "INSERT INTO funcionarios 
        (status, nome, cpf, rg, datanascimento, pis,
        cep, endereco, numero, complemento, bairro,
        cidade, estado, telfixo, telcelular, email,
        cargo, dataadmissao, datarescisao,
        datacadastro, dataalteracao
        )
        VALUES (
            'Ativo', '{$nome}', '{$cpf}', '{$rg}', '{$datanascimento}', 
            '{$pis}', '{$cep}', '{$endereco}', '{$numero}', '{$complemento}', 
            '{$bairro}', '{$cidade}', '{$estado}', '{$telfixo}', '{$telcelular}', 
            '{$email}', '{$cargo}', '{$dataadmissao}', now(), now(), now())    
        ";
        mysqli_query($conexao,$query) or die("Erro ao executar a consulta. " . mysqli_error($conexao));
        //MENSAGEM
        echo "<h5><span style='color:green';>Registro inserido com sucesso!</span></h5><br>"; 
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=funcionarioslistar'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";    
    }  
?>
</div>
</div>
</div>