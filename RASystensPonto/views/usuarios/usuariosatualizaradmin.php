<br>
<!--CONTAINER-->
<div class="container">
<div class="row align-items-center justify-content-center">
<div class="formulario col-lg-4 p-4 bg-white">
<!--CABECALHO-->
<header>
    <h4>Usuário</h4>
</header>
<!--CODIGO ATUALIZAR-->
<?php
    $id = strip_tags( mysqli_real_escape_string($conexao,$_POST["id"])); 
    $status = strip_tags( mysqli_real_escape_string($conexao,$_POST["status"])); 
    $nome = strip_tags( mysqli_real_escape_string($conexao,$_POST["nome"])); 
    $nivelacesso = strip_tags( mysqli_real_escape_string($conexao,$_POST["nivelacesso"])); 
    $email = strip_tags( mysqli_real_escape_string($conexao,$_POST["email"])); 
    $emailconfirma = strip_tags( mysqli_real_escape_string($conexao,$_POST["emailconfirma"])); 
    //$senha = strip_tags( mysqli_real_escape_string($conexao,hash('sha256',$_POST["senha"]))); 
    //$senhaconfirma = strip_tags( mysqli_real_escape_string($conexao,hash('sha256',$_POST["senhaconfirma"])));
    //$datacadastro = strip_tags( mysqli_real_escape_string($conexao,$_POST["datacadastro"])); 
    //$dataalteracao = strip_tags( mysqli_real_escape_string($conexao,$_POST["dataalteracao"]))
    
    //BUSCA O ARQUIVO CONEXAO
    require_once("db/conexao.php");
    //CONDICOES
    if ($_POST['status'] == 'Status'){//VALIDAR O STATUS
        echo "<h5><span style='color:red';>Registro não atualizado.<br>Selecione o status!</span></h5><br>";    
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=usuarioseditaradmin&id=$id'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>"; 
    }elseif($_POST['nivelacesso'] == 'Status'){//VALIDAR O NIVEL ACESSO
        echo "<h5><span style='color:red';>Registro não atualizado.<br>Selecione o nível de acesso!</span></h5><br>"; 
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=usuarioseditaradmin&id=$id'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";  
    }elseif($_POST['email'] != $_POST['emailconfirma']){//EMAILS TEM QUE SER IGUAIS
        echo "<h5><span style='color:red';>Registro não atualizado.<br>E-mails não conferem!</span></h5><br>";     
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=usuarioseditaradmin&id=$id'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>"; 
    }elseif(!empty($id)){//VALIDAR O ID
        //ATIALIZA NO BANCO
        $query = "UPDATE usuarios SET  
        status = '{$status}',
        nome = '{$nome}', 
        nivelacesso = '{$nivelacesso}', 
        email = '{$email}',
        emailconfirma = '{$emailconfirma}',
        dataalteracao = now()
        WHERE id = '{$id}'";  
        mysqli_query($conexao,$query) or die("Erro ao executar a consulta. " . mysqli_error($conexao));
        //MENSAGEM
        echo "<h5><span style='color:green';>Registro atualizado com sucesso!</span></h5><br>";  
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=usuarioslistaradmin'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>"; 
    }else{
        //MENSAGEM
        echo "<h5><span style='color:red';>Erro: Registro não atualizado!</span></h5><br>"; 
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=usuarioseditaradmin&id=$id'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";  
    }
?>
</div>
</div>
</div>