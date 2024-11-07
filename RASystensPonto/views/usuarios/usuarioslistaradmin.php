<!--CODIGO PHP PARA BUSCAR OS DADOS NO BANCO-->
<?php
    //REPASSA OS DADOS DA CAIXA PARA VARIAVEL PESQUISA
    $txtPesquisa = (isset($_POST['txtPesquisa']))?$_POST['txtPesquisa']:"";
?>
<div class="container-fluid">
<br>
<!--CABECALHO-->
<header>
    <h4><i class="bi bi-people-fill"></i> Lista de Usuários</h4>
</header>
<!--BOTAO LINK CADASTRAR-->
<div class="mb-2">
</div>
<!--FORMULARIO PESQUISAR-->
<div class="mb-2">
    <form action="inicio.php?menuop=usuarioslistaradmin" method="post">
        <div class="input-group input-group-sm">
            <input class="form-control" type="text" name="txtPesquisa" placeholder="Código, Status, Nome, Nível Acesso ou Email"  value="<?=$txtPesquisa?>">
            <button class="btn btn-outline-primary btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
        </div>       
    </form>
</div>
<!--TABELA-->
<div class="tabela table-responsive">
<table class="table table-hover table-sm">
    <!--CABECALHO TABELA-->
    <thead>
        <tr>
            <th>Cód</th>
            <th>Status</th>
            <th>Nome</th>
            <th>Nível Acesso</th>
            <th>Email</th>
            <th>Cadastro</th>
            <th>Alteração</th>            
            <th class="text-center"><a class="btn btn-outline-success btn-sm" href="inicio.php?menuop=usuarioscadastraradmin"><i class="bi bi-person-plus-fill"></i> Novo Usuário</a></th>
        </tr>
    </thead>
    <!--CORPO TABELA-->
    <tbody>
        <!--CODIGO PHP-->
        <?php
            //FAZ A PAGINACAO
            $quantidade = 10;
            $pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;
            $inicio = ($quantidade * $pagina) - $quantidade;
            //EXPLICACAO DO CALCULO INICIO
            //MULTIPLICACAO DE PAGINAS -> (10 * 1) - 10 = 0
            //PAGINAS -> 1 ->  (10 * 1) - 10 = 0
            //PAGINAS -> 2 ->  (10 * 2) - 10 = 10
            //PAGINAS -> 3 ->  (10 * 3) - 10 = 20
            //SELECT PARA BUSCAR OS DADOS NO BANCO
            $query = "SELECT * FROM usuarios WHERE id='{$txtPesquisa}' OR status LIKE '%{$txtPesquisa}%' OR nome LIKE '%{$txtPesquisa}%' OR nivelacesso LIKE '%{$txtPesquisa}%' OR email LIKE '%{$txtPesquisa}%' OR datacadastro LIKE '%{$txtPesquisa}%' OR dataalteracao LIKE '%{$txtPesquisa}%' ORDER BY id ASC LIMIT $inicio, $quantidade";
            $queryusuarios = mysqli_query($conexao,$query) or die("Erro ao executar a consulta!" .mysqli_error($conexao));
            while($dados = mysqli_fetch_assoc($queryusuarios)){
        ?>
            <tr>
                <td class="text-nowrap"><?=$dados["id"]?></td>
                <td class="text-nowrap"><?=$dados["status"]?></td>
                <td class="text-nowrap"><?=$dados["nome"]?></td>
                <td class="text-nowrap"><?=$dados["nivelacesso"]?></td>
                <td class="text-nowrap"><?=$dados["email"]?></td>
                <td class="text-nowrap"><?=date('d/m/Y',strtotime($dados["datacadastro"]))?></td>
                <td class="text-nowrap"><?=date('d/m/Y',strtotime($dados["dataalteracao"]))?></td>
                <td class="text-nowrap text-center">
                    <a class="btn btn-outline-warning btn-sm" href="inicio.php?menuop=usuarioseditaradmin&id=<?=$dados["id"]?>"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-outline-danger btn-sm" href="inicio.php?menuop=usuariosexcluiradmin&id=<?=$dados["id"]?>"><i class="bi bi-trash3"></i></a>
                    <a class="btn btn-outline-primary btn-sm" href="inicio.php?menuop=home"><i class="bi bi-arrow-left-square"></i></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>
</div>
<!--LINHA-->           
<!--MOSTRA A QUANTIDADE DE PAGINAS  E REGISTROS-->
<ul class="pagination justify-content-center">
<?php
    $queryTotal = "SELECT id FROM usuarios";
    $queryId = mysqli_query($conexao, $queryTotal) or die(mysqli_error($conexao));
    $numTotal = mysqli_num_rows($queryId);
    $totalPagina = ceil($numTotal / $quantidade);
    echo "<li class='page-item'><span class='page-link'>Registros: " . $numTotal . "</span></li>";
    //LINK PRIMEIRA PAGINA
    echo ' <li class="page-item"><a class="page-link" href="?menuop=usuarioslistaradmin&pagina=1">Primeira</a></li> ';
    //CONDICAO PARA MOSTRAR NAVEGACAO ANTERIOR
    if($pagina>11){
?>
        <li class="page-item"><a class="page-link" href="?menuop=usuarioslistaradmin&pagina=<?php echo $pagina-1 ?>"> << </a></li>
    <?php
    }                
    //NUMERACAO DE PAGINAS
    for($i=1;$i<=$totalPagina;$i++){
        if($i>=($pagina-10) && $i<=($pagina+10)){
            if($i==$pagina){
                //PAGINA ATUAL
                echo " <li class='page-item active'><span class='page-link'>$i</span></li> ";
            }else{
                //PAGINAS VISIVEIS
                echo " <li class='page-item'><a class='page-link' href=\"?menuop=usuarioslistaradmin&pagina={$i}\">{$i}</a></li> ";
            }
        }
    }
    //CONDICAO PARA MOSTRAR NAVEGACAO PROXIMA
    if($pagina<($totalPagina-10)){
    ?>
        <li class="page-item"><a class="page-link" href="?menuop=usuarioslistaradmin&pagina=<?php echo $pagina+1 ?>"> >> </a></li>
    <?php
    }
    //LINK ULTIMA PAGINA
        echo " <li class='page-item'><a class='page-link' href=\"?menuop=usuarioslistaradmin&pagina=$totalPagina\">Última</a></li> ";
    ?>
</ul>