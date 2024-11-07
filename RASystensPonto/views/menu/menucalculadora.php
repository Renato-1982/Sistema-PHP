<!--TITULO-->
<div class="container-fluid">
    <br>
    <h4><i class="bi bi-calculator"></i> Calculadora</h4>
</div>
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
        .table{
            border: 4px;
            border-color: #FF3300;
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
    <table class="align-items-center">
  <form name="formulario">              <!--aqui foi criado um formulario para a caixa de texto,e um objeto chamado formulario-->
       <!--<input type="text" id="calculo" >-->
       <input class="form-control" type="text" name="calculo" id="calculo">
  </form>

  <tr><!--começo da tabela-->
    <td><input type="button" value="7    " id="botao7" onclick="mostra(7);"></td><!--onclick chama a funçao mostra quando clicado-->
    <td><input type="button" value="8    " id="botao8" onclick="mostra(8);"></td>
    <td><input type="button" value="9    " id="botao9" onclick="mostra(9);"></td>
    <td><input type="button" value="+     " id="botao+" onclick="coleta('+');"></td><!--chama a funçao coleta-->
    <td><input type="button" value="Sqrt  " id="raiz" onclick="raiz();"></td>       <!--chama a funçao raiz-->
  </tr>
  <tr>
   <td><input type="button" value="4    " id="botao4" onclick="mostra(4);"></td>
   <td><input type="button" value="5    " id="botao5" onclick="mostra(5);"></td>
   <td><input type="button" value="6    " id="botao6" onclick="mostra(6);"></td>
   <td><input type="button" value="-      " id="botao-" onclick="coleta('-');"></td>
   <td><input type="button" value="Cos  " id="Cos" onclick="cos();"></td>
  </tr>
  <tr>
   <td><input type="button" value="1    " id="botao1" onclick="mostra(1);"></td>
   <td><input type="button" value="2    " id="botao2" onclick="mostra(2);"></td>
   <td><input type="button" value="3    " id="botao3" onclick="mostra(3);"></td>
   <td><input type="button" value="*      " id="botao*" onclick="coleta('*');"></td>
   <td><input type="button" value="Sen  " id="seno*" onclick="sen();"></td>
  </tr>
  <tr>
   <td><input type="button" value="0    " id="botao0" onclick="mostra(0);"/></td>
   <td><input type="button" value="CE" id="rest" onclick="novocalculo();"/></td>
   <td><input type="button" value="=    " id="botao=" onclick="calcula();"/></td>
   <td><input type="button" value="/      " id="botao/" onclick="coleta('/');"></td>
   <td><input type="button" value="Tan  " id="tangente" onclick="tan();"></td>
  </tr>
  <tr>
    <td><input type="button" value="RS" id="limpa" onclick="limpa();"> </td>
    <td><input type="button" value=".     " id="ponto" onclick="mostra('.');"> </td>  
  </tr>
 </table>
 

</div>
</div>
</div>
<br>
<h4><font color="#000000"><center>Instruçoes De Uso</center></font></h4><!--começo das instruçoes-->

 <font color="#000000">
    <ul>
      <li>A calculadora só realiza duas operaçoes de cada vez,portanto aperte CE cada vez que realizar uma operação para que possa realizar a proxima.
      <li>Para calcular o cos,tan,sen,sqrl digite primeiro o número e depois a operaçao.
      <li>O resutado do cosseno da tangente e do seno sao mostrados em radianos.
      <li>Use somente o teclado virtual.nao tente digitar os numeros.
      <li>O botao RS limpa a tela.
    </ul>
 </font>
</center>
    <!--JAVASCRIPT-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/validation.js"></script>
    <script language="javascript">   
    op=""; //operadores globais.
    num1="";
    num2="";
    resp="";   
       function mostra(x){  
       document.formulario.calculo.value += x; //essa funçao vai mostrando os numeros na caixa de texto
       }                                       //e o +- vai concatenando um numero apos o outro   
   
       function coleta(y){
       if(op==""){                             //se o operador for vazio
          op=y;                                //atribui o valor a variavel op o caracter +ou- etc.. conforme o clicado no botao
          num1=document.formulario.calculo.value;//atribui a num1 o valor da caixa de texto
          document.formulario.calculo.value=''; //limpa a caixa de texto
       }
       else{
         alert ("Não é possível realizar duas operacões");//se clicarmos varias vezes no botao operaçao aparecera essa mensagem.
       }  
    
    
   
       }
   
       function calcula(){
       if(op==""){
         alert ("Selecione uma operaçao");//se apertarmos o = antes do operador o op sera vazio e aparecera esse alert. 
       }
       else{
         num2=document.formulario.calculo.value;//num2 recebe oque esta na caixa de texto.
         resp=num1 + op + num2;//resp recebe o valor do num1+op+num2,exeplo 2+3
         document.formulario.calculo.value=eval(resp);//retorna o valor dos mesmos 2+3 como resposta na caixa de texto devido ao eval
                                                      //se o eval nao estivesse ai apareceria na caixa de texto 2+3.o eval retorna o valor do 2+3 
       }
      
       }

       function novocalculo(){//essa funçao permite fazer mais um calculo.
         num1="";//limpa as variaveis
         num2="";
         op="";
         resp="";
         document.formulario.calculo.value="";//limpa a caixa de texto
       }
       function raiz(){//funçao que calcula a raiz quadrada
         num1=document.formulario.calculo.value;
         document.formulario.calculo.value='';
         resp=Math.sqrt(num1);//funçao em java script que calcula a raiz quadrada
         document.formulario.calculo.value=eval(resp);
       }
       function cos(){//funçao que calcula o cosseno
         num1=document.formulario.calculo.value;
         document.formulario.calculo.value='';
         resp=Math.cos(num1);
         document.formulario.calculo.value=eval(resp);
       }
       function sen(){//funçao que calcula o seno
         num1=document.formulario.calculo.value;
         document.formulario.calculo.value='';
         resp=Math.sin(num1);
         document.formulario.calculo.value=eval(resp);
       }
       function tan(){//funçao que calcula a tangente
         num1=document.formulario.calculo.value;
         document.formulario.calculo.value='';
         resp=Math.tan(num1);
         document.formulario.calculo.value=eval(resp);
       }
       function limpa(){
         document.formulario.calculo.value=""; 
  
       }      
            
   
</script>
</body>
</html>














<html>
<!--
<script language="javascript">
   
    op=""; //operadores globais.
    num1="";
    num2="";
    resp="";
   
       function mostra(x){
  
       document.formulario.calculo.value += x; //essa funçao vai mostrando os numeros na caixa de texto
       }                                       //e o +- vai concatenando um numero apos o outro   
   
       function coleta(y){
       if(op==""){                             //se o operador for vazio
          op=y;                                //atribui o valor a variavel op o caracter +ou- etc.. conforme o clicado no botao
          num1=document.formulario.calculo.value;//atribui a num1 o valor da caixa de texto
          document.formulario.calculo.value=''; //limpa a caixa de texto
       }
       else{
         alert ("Não é possível realizar duas operacões");//se clicarmos varias vezes no botao operaçao aparecera essa mensagem.
       }  
    
    
   
       }
   
       function calcula(){
       if(op==""){
         alert ("Selecione uma operaçao");//se apertarmos o = antes do operador o op sera vazio e aparecera esse alert. 
       }
       else{
         num2=document.formulario.calculo.value;//num2 recebe oque esta na caixa de texto.
         resp=num1 + op + num2;//resp recebe o valor do num1+op+num2,exeplo 2+3
         document.formulario.calculo.value=eval(resp);//retorna o valor dos mesmos 2+3 como resposta na caixa de texto devido ao eval
                                                      //se o eval nao estivesse ai apareceria na caixa de texto 2+3.o eval retorna o valor do 2+3 
       }
      
       }

       function novocalculo(){//essa funçao permite fazer mais um calculo.
         num1="";//limpa as variaveis
         num2="";
         op="";
         resp="";
         document.formulario.calculo.value="";//limpa a caixa de texto
       }
       function raiz(){//funçao que calcula a raiz quadrada
         num1=document.formulario.calculo.value;
         document.formulario.calculo.value='';
         resp=Math.sqrt(num1);//funçao em java script que calcula a raiz quadrada
         document.formulario.calculo.value=eval(resp);
       }
       function cos(){//funçao que calcula o cosseno
         num1=document.formulario.calculo.value;
         document.formulario.calculo.value='';
         resp=Math.cos(num1);
         document.formulario.calculo.value=eval(resp);
       }
       function sen(){//funçao que calcula o seno
         num1=document.formulario.calculo.value;
         document.formulario.calculo.value='';
         resp=Math.sin(num1);
         document.formulario.calculo.value=eval(resp);
       }
       function tan(){//funçao que calcula a tangente
         num1=document.formulario.calculo.value;
         document.formulario.calculo.value='';
         resp=Math.tan(num1);
         document.formulario.calculo.value=eval(resp);
       }
       function limpa(){
         document.formulario.calculo.value=""; 
  
       }      
            
   
</script>-->

