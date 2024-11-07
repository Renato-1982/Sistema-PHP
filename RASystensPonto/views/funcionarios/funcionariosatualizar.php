<br>
<!--CONTAINER-->
<div class="container">
<div class="row align-items-center justify-content-center">
<div class="formulario col-lg-4 p-4 bg-white">
<!--CABECALHO-->
<header>
    <h4>Funcionário</h4>
</header>
<!--CODIGO ATUALIZAR-->
<?php
    $id = strip_tags( mysqli_real_escape_string($conexao,$_POST["id"])); 
    $status = strip_tags( mysqli_real_escape_string($conexao,$_POST["status"])); 
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
    $datarescisao = strip_tags( mysqli_real_escape_string($conexao,$_POST["datarescisao"])); 
    //$datacadastro = strip_tags( mysqli_real_escape_string($conexao,$_POST["datacadastro"])); 
    //$dataalteracao = strip_tags( mysqli_real_escape_string($conexao,$_POST["dataalteracao"])); 

    //BUSCA O ARQUIVO CONEXAO
    require_once("db/conexao.php");
    //CONDICOES
    if ($_POST['status'] == 'Status'){//VALIDAR O STATUS
        echo "<h5><span style='color:red';>Registro não atualizado.<br>Selecione um status!</span></h5><br>";  
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=funcionarioseditar&id=$id'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";  
    }elseif(!empty($id)){//VALIDAR O ID
        //ATIALIZA NO BANCO
        $query = "UPDATE funcionarios SET
        status = '{$status}',
        nome = '{$nome}',
        cpf = '{$cpf}',
        rg = '{$rg}',
        datanascimento = '{$datanascimento}',
        pis = '{$pis}',
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
        cargo = '{$cargo}', 
        dataadmissao = '{$dataadmissao}', 
        datarescisao = '{$datarescisao}',
        dataalteracao = now()
        WHERE id = '{$id}'";
        mysqli_query($conexao,$query) or die("Erro ao executar a consulta. " . mysqli_error($conexao));
        //MENSAGEM
        echo "<h5><span style='color:green';>Registro atualizado com sucesso!</span></h5><br>";      
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=funcionarioslistar'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>"; 
    }else {
        //MENSAGEM
        echo "<h5><span style='color:red';>Registro não atualizado!</span></h5><br>";  
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=funcionarioseditar&id=$id'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";    
    }
?>
</div>
</div>
</div>