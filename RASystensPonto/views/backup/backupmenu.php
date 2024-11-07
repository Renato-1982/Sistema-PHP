<!--TITULO-->
<div class="container-fluid">
    <br>
    <h4><i class="bi bi-menu-button-wide-fill"></i> Menu Backup</h4>
</div>
<!--HTML-->
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
    </style>
    <!--TITULO-->
    <title>RASystens</title>
</head>
<!--CORPO DA PAGINA-->
<body class="bg-light">
    <!--CONTAINER-->
    <div class="container mt-4">
        <div class="row align-items-center justify-content-center">
            <div class="formulario col-lg-4 p-4 bg-white">
                <!--IMAGEM LOGO-->
                <div class="card-header text-center bg-primary p-2 justify-content-center mb-4 shadow rounded">
                    <img src="img/rasystens_nome_light.png" alt="RASystens" width="140">
                </div>
                <!--FORMULARIO-->
                <form class="needs-validation" action="#.php" method="POST" novalidate>
                    <!--BOTAO REALIZAR BACKUP-->
                    <div class="form-group mb-2">
                        <a class="btn btn-outline-primary w-100" href="inicio.php?menuop=backuprealizar"><i class="bi bi-cloud-arrow-down-fill"></i> Realizar Backup</a>
                    </div>
                    <!--BOTAO RESTAURAR BACKUP-->
                    <div class="form-group mb-2">
                        <a class="btn btn-outline-primary w-100" href="inicio.php?menuop=backuprestaurar"><i class="bi bi-cloud-arrow-up-fill"></i> Restaurar Backup</a>
                    </div>
                    <!--BOTAO MENU-->
                    <div class="form-group mb-2">
                        <a class="btn btn-outline-primary w-100" href="inicio.php?menuop=menu"><i class="bi bi-arrow-return-left"></i> Voltar Menu</a>
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