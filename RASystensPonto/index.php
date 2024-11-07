<?php
    //BUSCA O ARQUIVO CONEXAO
    include "./db/conexao.php";
    //DECLARA VARIAVEL VAZIA
    $msg_error = "";
    //VERIFICACAO DOS DADOS NO BANCO
    if( isset($_POST["email"]) &&  isset($_POST["nivelacesso"]) && isset($_POST["senha"])  ){
        $email =  mysqli_escape_string($conexao,$_POST["email"]);
        $nivelacesso =  mysqli_escape_string($conexao,$_POST["nivelacesso"]);
        $senha = hash('sha256',$_POST["senha"]);
        //SELECT DOS DADOS NO BANCO
        $query = "SELECT * FROM usuarios WHERE email = '{$email}' and nivelacesso = '{$nivelacesso}' and senha = '{$senha}'";
        $queryusuario = mysqli_query($conexao, $query);
        $dadosusuario = mysqli_fetch_assoc($queryusuario);
        $linha = mysqli_num_rows($queryusuario);
        //CONDICAO
        if( $linha != 0 ) {
            //CRIA A SESSAO
            session_start();
            //VERIFICA OS DADOS
            $_SESSION["email"] = $email;
            $_SESSION["nivelacesso"] = $nivelacesso;
            $_SESSION["senha"] = $senha;
            $_SESSION["nome"] = $dadosusuario["nome"];
            //DIRECIONA PARA PAGINA
            header('Location: inicio.php');
        }else{
            //MENSAGEM DE ERRO
            $msg_error = "<div class='alert alert-danger mt-3'><p>Dados não conferem!</p></div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt">
<!--CABECALHO-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--LINK CSS BOOTSTRAP ICONES E IMAGENS--> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap5.3.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <!--FORMATACAO CSS-->  
    <style>
        .formulario {
          border-radius: 15px;          
          box-shadow: 0 0 30px #000000;
        }
        .input-group-text {
            width: 3rem;
            text-align: center;
        }
        .btn {
          border-radius: 15px;
        }
        #btn-senha {
            font-size: 25px;
            cursor: pointer;
            position: absolute;
            right: 2%;
            color: #777777;
        }
    </style>
    <!--TITULO-->
    <title>RASystens</title>
</head>
<!--CORPO DA PAGINA-->
<body class="bg-info">
    <!--CONTAINER-->
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="formulario col-10 col-sm-8 col-md-6 col-lg-4 p-4 bg-white">
                <!--IMAGEM LOGO-->
                <div class="card-header text-center bg-primary p-2 justify-content-center mb-4 shadow rounded">
                    <img src="img/rasystens_nome_light.png" alt="RASystens" width="140">
                </div>
                <!--FORMULARIO-->
                <form class="needs-validation" action="index.php" method="POST" novalidate>
                    <!--EMAIL-->
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input class="form-control" type="text" name="email" id="email" placeholder="Email do Usuário" required>
                        </div>
                    </div>
                    <!--NIVEL ACESSO-->
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-list"></i></span>
                            <select name="nivelacesso" class="form-select" id="nivelacesso" required>
                                <option selected value="">Nível Acesso</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Gerente">Gerente</option>
                                <option value="Funcionário">Funcionário</option>
                            </select>
                        </div>
                    </div>
                    <!--SENHA-->
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                            <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha do Usuário" required>
                            <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
                        </div>
                        <!--PHP PARA MENSAGEM DE ERRO-->
                        <?php
                            echo $msg_error;
                        ?>
                    </div>
                    <!--BOTAO-->
                    <div class="form-group mb-3">
                        <button class="btn btn-outline-primary w-100"><i class="bi bi-box-arrow-in-right"></i> Entrar</button>     
                    </div>
                    <!--BOTAO-->
                    <div class="form-group">
                        Não tem uma conta? <a href="usuariosacessar.php" class="register-link"> Cadastrar Usuário</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--JAVASCRIPT-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/validation.js"></script>
</body>
</html>