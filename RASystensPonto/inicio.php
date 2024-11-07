<?php
    //BUSCA O ARQUIVO CONEXAO
    include("db/conexao.php");
    //INICIA A SESSAO
    session_start();
    //CONDICAO
    if(isset($_SESSION["email"]) and isset($_SESSION["nivelacesso"]) and isset($_SESSION["senha"]) ){
        $email = $_SESSION["email"];
        $nivelacesso = $_SESSION["nivelacesso"];
        $senha = $_SESSION["senha"];
        $nome = $_SESSION["nome"];
        //SELECT DOS DADOS NO BANCO
        $query = "SELECT * FROM usuarios WHERE nome = '{$nome}' and email = '{$email}' and nivelacesso = '{$nivelacesso}' and senha = '{$senha}'";
        $queryusuario = mysqli_query($conexao, $query);
        $dadosusuario = mysqli_fetch_assoc($queryusuario);
        $linha = mysqli_num_rows($queryusuario);        
        //CONDICAO
        if( $linha == 0 ) {
            session_unset();
            session_destroy();
            header('Location: index.php');
            exit();
        }
    }else{
        header('Location: index.php');
        exit(); 
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
    <!--TITULO-->
    <title>RASystens</title>
    <style>
    body{
        font-size: 12px;
    }
    .btn{
        border-radius: 15px;
    }
    .table{
        border-radius: 5px;
    }
    </style>
</head>
<!--CORPO DA PAGINA-->
<body>
    <!--CABECALHO-->
    <header class="bg-primary">
        <div class="container-fluid">
            <!--<h3>RASystens Ponto</h3>--> 
            <!--MENU SUPERIOR-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="#"><img src="img/rasystens_light_aguia.png" width="50" alt="RASystens"></a>          
                <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                    <ul class="navbar-nav mr-auto">
                        <?php if($nivelacesso == 'Administrador'){ ?>
                                <h5><li class="nav-item active"><a class="nav-link text-light" href="inicio.php?menuop=home">Home</a></li></h5>
                                <h5><li class="nav-item"><a class="nav-link text-light" href="inicio.php?menuop=menu">Menu</a></li></h5>
                                <h5><li class="nav-item"><a class="nav-link text-light" href="inicio.php?menuop=usuarioslistaradmin">Usuários</a></li></h5>
                                <h5><li class="nav-item"><a class="nav-link text-light" href="inicio.php?menuop=funcionarioslistar">Funcionários</a></li></h5>
                        <?php } ?>
                        <?php if($nivelacesso == 'Gerente'){ ?>
                                <h5><li class="nav-item active"><a class="nav-link text-light" href="inicio.php?menuop=home">Home</a></li></h5>
                                <h5><li class="nav-item"><a class="nav-link text-light" href="inicio.php?menuop=menu">Menu</a></li></h5>
                                <h5><li class="nav-item"><a class="nav-link text-light" href="inicio.php?menuop=funcionarioslistar">Funcionários</a></li></h5>
                        <?php } ?>
                        <?php if($nivelacesso == 'Funcionário'){ ?>
                                <h5><li class="nav-item active"><a class="nav-link text-light" href="inicio.php?menuop=home">Home</a></li></h5>
                                <h5><li class="nav-item"><a class="nav-link text-light" href="inicio.php?menuop=menu">Menu</a></li></h5>
                        <?php } ?>
                    </ul>
                    <div class="navbar-nav w-100 justify-content-end">
                        <a href="logout.php" class="nav-link text-light">
                        <h5><i class="bi bi-person"> </i><?=$nome?> - Sair <i class="bi bi-box-arrow-right"></i></h5>
                        </a>
                    </div>
                </div>            
            </nav>
        </div>
    </header>
    <!--MENU NAVEGACAO PELAS PAGINAS-->
    <main>
        <div class="container-fluid">
        <?php
            //MENU DE OPERACOES
            $menuop = (isset($_GET["menuop"]))?$_GET["menuop"]:"home";
            //FUNCAO PARA ABRIR CALCULADORA E BLOCO DE NOTAS	
            //if (isset($_GET["Abre"])){
                //$Abre = $_GET["Abre"];
                //exec($Abre);
            //}
            switch ($menuop) { 
                //PAGINA INICIAL
                case 'home':
                    include("views/home/home.php");
                break;
                //MENU
                case'menu':
                    include("views/menu/menu.php");
                break;
                case'menucalculadora':
                    include("views/menu/menucalculadora.php");
                break;
                //BACKUP
                case'backupmenu':
                    include("views/backup/backupmenu.php");
                break;
                case'backuprealizar':
                    include("views/backup/backuprealizar.php");
                break;
                case'backuprealizarprocessa':
                    include("views/backup/backuprealizarprocessa.php");
                break;
                case'backuprestaurar':
                    include("views/backup/backuprestaurar.php");
                break;
                case'backuprestaurarprocessa':
                    include("views/backup/backuprestaurarprocessa.php");
                break;
                //EMPRESA
                case'empresalistar':
                    include("views/empresa/empresalistar.php");
                break;
                case'empresacadastrar':
                    include("views/empresa/empresacadastrar.php");
                break;
                case'empresainserir':
                    include("views/empresa/empresainserir.php");
                break;
                case'empresaeditar':
                    include("views/empresa/empresaeditar.php");
                break;
                case'empresaatualizar':
                    include("views/empresa/empresaatualizar.php");
                break;
                case'empresaexcluir':
                    include("views/empresa/empresaexcluir.php");
                break;
                //CONTATOS
                case'contatos':
                    include("views/contatos/contatos.php");
                break;
                //USUARIOS
                case'usuarioslistaradmin':
                    include("views/usuarios/usuarioslistaradmin.php");
                break;
                case'usuarioscadastraradmin':
                    include("views/usuarios/usuarioscadastraradmin.php");
                break;
                case'usuariosinseriradmin':
                    include("views/usuarios/usuariosinseriradmin.php");
                break;
                case'usuarioseditaradmin':
                    include("views/usuarios/usuarioseditaradmin.php");
                break;
                case'usuariosatualizaradmin':
                    include("views/usuarios/usuariosatualizaradmin.php");
                break;
                case'usuariosexcluiradmin':
                    include("views/usuarios/usuariosexcluiradmin.php");
                break;
                //FUNCIONARIOS
                case'funcionarioslistar':
                    include("views/funcionarios/funcionarioslistar.php");
                break;
                case'funcionarioscadastrar':
                    include("views/funcionarios/funcionarioscadastrar.php");
                break;
                case'funcionariosinserir':
                    include("views/funcionarios/funcionariosinserir.php");
                break;
                case'funcionarioseditar':
                    include("views/funcionarios/funcionarioseditar.php");
                break;
                case'funcionariosatualizar':
                    include("views/funcionarios/funcionariosatualizar.php");
                break;
                case'funcionariosexcluir':
                    include("views/funcionarios/funcionariosexcluir.php");
                break;
                //PAGINA INICIAL
                default:
                    include("views/home/home.php");
                break;
            }
        ?>
        </div>
    </main>
    <footer class="container-fluid fixed-bottom bg-primary">
        <div class="row">
        <div class="text-left text-white col-6"><?=$nivelacesso?></div>
        <div class="text-left text-white col-6">RASystens &copy;2024</div>
        </div>
    </footer>
    <!--JAVASCRIPT-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/validation.js"></script>
    <!--FORMATA O CEP-->  
    <script>
        function cepMascara(cep) {
            if (cep.value.length == 2) {
                cep.value = cep.value + '.' 
            }
            if (cep.value.length == 6) {
                cep.value = cep.value + '-' 
            }
        }
    </script>
    <!--FORMATA O CPF-->  
    <script>
        function cpfMascara(cpf) {
            if (cpf.value.length == 3) {
                cpf.value = cpf.value + '.' 
            }
            if (cpf.value.length == 7) {
                cpf.value = cpf.value + '.' 
            }
            if (cpf.value.length == 11) {
                cpf.value = cpf.value + '-' 
            }
        }
    </script>
    <!--FORMATA O CNPJ-->  
    <script>
        function cnpjMascara(cnpj) {
            if (cnpj.value.length == 2) {
                cnpj.value = cnpj.value + '.' 
            }
            if (cnpj.value.length == 6) {
                cnpj.value = cnpj.value + '.' 
            }
            if (cnpj.value.length == 10) {
                cnpj.value = cnpj.value + '/' 
            }
            if (cnpj.value.length == 15) {
                cnpj.value = cnpj.value + '-' 
            }
        }
    </script>
    <!--FORMATA TEL FIXO-->  
    <script>
        function telfixoMascara(telfixo) {
            if (telfixo.value.length == "") {
                telfixo.value = telfixo.value + '(' 
            }
            if (telfixo.value.length == 3) {
                telfixo.value = telfixo.value + ')' 
            }
            if (telfixo.value.length == 8) {
                telfixo.value = telfixo.value + '-' 
            }
        }
    </script>
    <!--FORMATA TEL CELULAR-->       
    <script>
        function telcelularMascara(telcelular) {
            if (telcelular.value.length == "") {
                telcelular.value = telcelular.value + '(' 
            }
            if (telcelular.value.length == 3) {
                telcelular.value = telcelular.value + ')' 
            }
            if (telcelular.value.length == 5) {
                telcelular.value = telcelular.value + '.' 
            }
            if (telcelular.value.length == 10) {
                telcelular.value = telcelular.value + '-' 
            }
        }
    </script>
    <!--BUSCA O CEP-->  
    <script>
        function buscaCep() {
            let cep = document.getElementById('cep').value;
            if(cep !== ""){
                let url = "https://brasilapi.com.br/api/cep/v1/" + cep;
                let req = new XMLHttpRequest();
                req.open("GET", url);
                req.send();
                //TRATAR A RESPOSTA DA REQUISICAO
                req.onload = function(){
                    if(req.status === 200){
                        let endereco = JSON.parse(req.response);
                        document.getElementById("endereco").value = endereco.street;
                        document.getElementById("bairro").value = endereco.neighborhood;
                        document.getElementById("cidade").value = endereco.city;
                        document.getElementById("estado").value = endereco.state;
                    }
                    else if(req.status === 404){
                        alert("CEP inválido!");
                    }
                    else{
                        alert("Erro ao fazer a requisição!");
                    }
                }
            }
        }
        window.onload = function(){
            let cep = document.getElementById("cep");
            const value = cep.value.replace(/[^0-9]+/, '');
            cep.addEventListener("blur", buscaCep);
        }
    </script>
</body>
</html>