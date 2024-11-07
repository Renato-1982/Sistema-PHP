<!--TITULO-->
<div class="container-fluid">
    <br>
    <h4><i class="bi bi-person-lines-fill"></i> Contatos</h4>
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
    <!--TITULO-->
    <title>RASystens</title>
</head>
<!--CORPO DA PAGINA-->
<body class="bg-light">
    <!--CONTAINER-->
    <div class="container mt-4">
        <div class="row align-items-center justify-content-center">
            <div class="formulario col-lg-5 p-4 bg-white">
                <!--IMAGEM LOGO-->
                <div class="card-header text-center bg-primary p-2 justify-content-center mb-4 shadow rounded">
                    <img src="img/rasystens_nome_light.png" alt="RASystens" width="140">
                </div>
                <!--FORMULÁRIO CONTATO-->
                <form method="POST">                            
                    <!--EMPRESA PROGRAMADORA-->
                    <div class="mb-2">
                        <br>
                        <p class="text-primary" style="font-size: 20px">Empresa: <span class="register-link"> MultSeg RAS Consultoria</span></p>
                        <p class="text-primary" style="font-size: 20px">Email: <span class="register-link"> renatoantonio219@gmail.com</span></p>
                        <p class="text-primary" style="font-size: 20px">Telefones: <span class="register-link"> (31)9.9757-2559 | (31)9.8804-8781</span></p>
                        <br>
                        <?php echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=home'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>"; ?> 
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