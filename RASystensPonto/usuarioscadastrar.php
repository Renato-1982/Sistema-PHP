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

<!--DIV DO FORMULARIO-->
<div class="container"> 
<div class="row vh-100 align-items-center justify-content-center">
<div class="formulario col-lg-10 p-4 bg-white">
    <!--IMAGEM LOGO-->
    <div class="card-header text-center bg-primary p-2 justify-content-center mb-4 shadow rounded">
        <img src="img/rasystens_nome_light.png" alt="RASystens" width="140">
    </div>
    <!--FORMULARIO-->
    <form class="cadastro needs-validation" action="usuariosinserir.php" method="POST" novalidate>
        <div class="row">
            <!--NOME-->
            <div class="mb-0 col-8">
                <label class="form-label mb-0" for="nome">Nome</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input class="form-control" type="text" id="nome" name="nome" maxlength="90" placeholder="Nome" required>
                </div>
            </div>
            <!--NIVEL ACESSO-->
            <div class="mb-0 col-4">
                <label class="form-label mb-0" for="status">Nível Acesso</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-check2-circle"></i></span>
                    <select class="form-select" name="nivelacesso" id="nivelacesso" maxlength="7" required>
                        <option selected value="">Nível Acesso</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Funcionario">Funcionário</option>
                    </select>
                </div>           
            </div>
            <!--EMAIL-->
            <div class="mb-0 col-6">
                <label class="form-label mb-0" for="email">Email</label>
                <div class="input-group ">
                    <span class="input-group-text">@</span>
                    <input class="form-control" type="email" id="email" name="email" maxlength="90" placeholder="Email" required>
                </div>
            </div>
            <!--EMAIL CONFIRMA-->
            <div class="mb-0 col-6">
                <label class="form-label mb-0" for="email">Email Confirma</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input class="form-control" type="emailconfirma" id="emailconfirma" name="emailconfirma" maxlength="90" placeholder="Email Confirma" required>
                </div>
            </div>
            <!--SENHA-->
            <div class="mb-0 col-6">
                <label class="form-label mb-0" for="senha">Senha</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input class="form-control" type="password" id="senha" name="senha" maxlength="90" placeholder="Senha" required>
                    <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
                </div>
            </div>
            <!--SENHA CONFIRMA-->
            <div class="mb-2 col-6">
                <label class="form-label mb-0" for="senhaconfirma">Senha Confirma</label>
                <div class="input-group ">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input class="form-control" type="password" id="senhaconfirma" name="senhaconfirma" maxlength="90" placeholder="Senha Confirma" required>
                    <i class="bi bi-eye-fill" id="btn-senhaConfirma" onclick="mostrarSenhaConfirma()"></i>
                </div>
            </div>
        </div>
        <!--BOTAO-->
        <div class="form-group">
            <input class="btn btn-outline-primary" type="submit" value="Cadastrar" name="btnAdicionar">
            Já tem uma conta? <a href="index.php" class="register-link"> Login</a>
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