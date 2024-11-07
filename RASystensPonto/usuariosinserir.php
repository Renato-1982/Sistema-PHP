<br>
<!--CONTAINER-->
<div class="container">
<div class="row align-items-center justify-content-center">
<div class="formulario col-lg-4 p-4 bg-white">
<!--CABECALHO-->
<header>
    <h4>Usuário</h4>
</header>
<!--CODIGO INSERIR-->
<?php
    //INICIAR SESSAO (A SESSAO SEMPRE TEM QUE ESTAR A CIMA DAS OUTRAS. NO TOPO)
    session_start();
    //BUSCA O ARQUIVO CONEXAO
    include "./db/conexao.php";
    //$status = strip_tags( mysqli_real_escape_string($conexao,$_POST["status"])); 
    $nome = strip_tags( mysqli_real_escape_string($conexao,$_POST["nome"])); 
    $nivelacesso = strip_tags( mysqli_real_escape_string($conexao,$_POST["nivelacesso"])); 
    $email = strip_tags( mysqli_real_escape_string($conexao,$_POST["email"])); 
    $emailconfirma = strip_tags( mysqli_real_escape_string($conexao,$_POST["emailconfirma"])); 
    $senha = strip_tags( mysqli_real_escape_string($conexao,$_POST["senha"])); 
    $senhaconfirma = strip_tags( mysqli_real_escape_string($conexao,$_POST["senhaconfirma"]));
    //$datacadastro = strip_tags( mysqli_real_escape_string($conexao,$_POST["datacadastro"])); 
    //$dataalteracao = strip_tags( mysqli_real_escape_string($conexao,$_POST["dataalteracao"])); 
    
    //BUSCA O ARQUIVO CONEXAO
    require_once("db/conexao.php");
    //FAZ O SELECT E VERIFICA SE O EMAIL JA ESTA CADASTRADO NO BANCO
    $queryemail = "SELECT email FROM usuarios WHERE email = '$email' ";
    $buscaemail = mysqli_query($conexao, $queryemail);
    $verifica = mysqli_num_rows($buscaemail);
    //CONDICOES
    if ($_POST['nivelacesso'] == 'Nível Acesso'){//VALIDAR O NIVEL ACESSO
        echo "<h5><span style='color:red';>Registro não inserido.<br>Selecione o nível de acesso!</span></h5><br>"; 
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=usuarioscadastrar'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";      
        //echo "<h5><a href='inicio.php?menuop=usuarioscadastraradmin'>Voltar</a></h5>"; 
    }elseif($_POST['email'] != $_POST['emailconfirma']){//EMAILS TEM QUE SER IGUAIS
        echo "<h5><span style='color:red';>Registro não inserido.<br>E-mails não conferem!</span></h5><br>";   
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=usuarioscadastrar'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";    
        //echo "<h5><a href='inicio.php?menuop=usuarioscadastraradmin'>Voltar</a></h5>"; 
    }elseif($_POST['senha'] != $_POST['senhaconfirma']){//SENHA TEM QUE SER IGUAIS
        echo "<h5><span style='color:red';>Registro não inserido.<br>Senhas não conferem!</span></h5><br>";   
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=usuarioscadastrar'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";    
        //echo "<h5><a href='inicio.php?menuop=usuarioscadastraradmin'>Voltar</a></h5>"; 
    }elseif($senha < 6 OR $senhaconfirma < 6){//SENHA MINIMO DE 6 CARACTERES
        echo "<h5><span style='color:red';>Registro não inserido.<br>Senha deve ter pelo menos 6 caracteres!</span></h5><br>"; 
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=usuarioscadastrar'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";      
        //echo "<h5><a href='inicio.php?menuop=usuarioscadastraradmin'>Voltar</a></h5>"; 
    }elseif(!empty($verifica)){//VERIFICA SE O EMAIL JÁ ESTÁ CADASTRADO
        echo "<h5><span style='color:red';>Registro não inserido.<br>E-mail já cadastrado!</span></h5><br>";   
        echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=usuarioscadastrar'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";    
        //echo "<h5><a href='inicio.php?menuop=usuarioscadastraradmin'>Voltar</a></h5>"; 
    }else{
        //CRIPTOGRAFAR AS SENHAS
        $senhahash = strip_tags( mysqli_real_escape_string($conexao,hash('sha256',$senha))); 
        $senhaconfirmahash = strip_tags( mysqli_real_escape_string($conexao,hash('sha256',$senhaconfirma)));
        //INSERIR NO BANCO
        $query = "INSERT INTO usuarios 
            (status, nome, nivelacesso,
            email, emailconfirma, 
            senha, senhaconfirma,
            datacadastro, dataalteracao
        )
        VALUES (
            'Ativo', '{$nome}', '{$nivelacesso}', 
            '{$email}', '{$emailconfirma}', 
            '{$senhahash}', '{$senhaconfirmahash}', 
            now(), now()
            )    
        ";
        mysqli_query($conexao,$query) or die("Erro ao executar a consulta. " . mysqli_error($conexao));
        //MENSAGEM
        echo "<h5><span style='color:green';>Registro inserido com sucesso!</span></h5><br>";   
        echo "<h5><a class='btn btn-outline-primary w-100' href='index.php'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>"; 
        //echo "<h5><a href='index.php'>Voltar</a></h5>";  
    }
?>
</div>
</div>
</div>