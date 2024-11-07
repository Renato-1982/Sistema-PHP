<br>
<!--CONTAINER-->
<div class="container">
<div class="row align-items-center justify-content-center">
<div class="formulario col-lg-4 p-4 bg-white">
<!--CABECALHO-->
<header>
    <h4>Usuário</h4>
</header>
<!--CODIGO EXCLUIR-->
<?php
    //PEGA O ID PELA URL
    $id = mysqli_real_escape_string($conexao, $_GET['id']);
    //DELETA O REGISTRO
    $query = "DELETE FROM usuarios WHERE id = '{$id}'";
    mysqli_query($conexao, $query) 
    or die("Erro ao excluir o registro. Erro:" . mysqli_error($conexao) );
    //MENSAGEM
    //echo "Registro excluido com sucesso!";
    echo "<h5><span style='color:green';>Registro excluído com sucesso!</span></h5><br>"; 
    echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=usuarioslistaradmin'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";      
    //echo "<h5><a href='inicio.php?menuop=home'>Voltar</a></h5>";  
?>
</div>
</div>
</div>