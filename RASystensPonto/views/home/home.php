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
        time{
        text-align: center;
        border: 1px solid #0000CD;
        padding: 4px 12px;
        background-color: #0000FF;
        color: #f7f7f7;
        font-size: 14em;
        font-weight: 300;
        border-radius: 7px;
        }
    </style>
    <!--TITULO-->
    <title>RASystens</title>
</head>
<!--CORPO DA PAGINA-->
<body class="bg-light">
<!--CABECALHO--> 
<div class="container-fluid">
    <br>
    <h4><i class="bi bi-house-fill"></i> Página Principal</h4>
</div>

<!--CONTAINER-->
<div class="container mt-5">
    <div class="row align-items-center justify-content-center">
        <div class="formulario col-lg-8 p-1 bg-white">
            <div class="card">

                <!--RELOGIO--> 
                <time class="fw-semibold">>12:00:00</time>

            </div>
        </div>
    </div>
</div>


    <!--JAVASCRIPT-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/validation.js"></script>
    <script>
    const showTimeNow = () =>{
        //SELECIONANDO A TAG DE DESTINO
        const clockTag = document.querySelector('time');        
        //INTANCIANDO A CLASSE DATE
        let dateNow = new Date();
        //PEGANDO OS VALORES DESEJADOS
        let hh = dateNow.getHours();
        let mm = dateNow.getMinutes();
        let ss = dateNow.getSeconds();        
        //VALIDANDO A NECESSIDADE DE ADICIONAR ZERO NA EXIBICAO
        hh = hh < 10 ? '0'+ hh : hh; 
        mm = mm < 10 ? '0'+ mm : mm; 
        ss = ss < 10 ? '0'+ ss : ss;         
        //ATRIBUINDO OS VALORES E MONTANDO O FORMATO DA HORA A SER EXIBIDO
        clockTag.innerText = hh +':'+ mm +':'+ ss;
        }
        //EXECUTANDO A FUNCAO A CADA 1 SEGUNDO
        showTimeNow()
        setInterval(showTimeNow, 1000);
    </script>
</body>
</html>