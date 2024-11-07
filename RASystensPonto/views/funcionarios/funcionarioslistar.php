<!--CODIGO PHP PARA BUSCAR OS DADOS NO BANCO-->
<?php
    //REPASSA OS DADOS DA CAIXA PARA VARIAVEL PESQUISA
    $txtPesquisa = (isset($_POST['txtPesquisa']))?$_POST['txtPesquisa']:"";
?>
<div class="container-fluid">
<br>
<!--CABECALHO-->
<header>
    <h4><i class="bi bi-person-lines-fill"></i> Lista de Funcionários</h4>
</header>
<!--BOTAO LINK CADASTRAR-->
<div class="mb-2">
</div>
<!--FORMULARIO PESQUISAR-->
<div class="mb-2">
    <form action="inicio.php?menuop=funcionarioslistar" method="post">
        <div class="input-group input-group-sm">
            <input class="form-control" type="text" name="txtPesquisa" placeholder="Código, Status, Nome, Cpf, Email, Telefone Fixo, Telefone Celular, Nascimento ou Cargo"  value="<?=$txtPesquisa?>">
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
            <th>Cpf</th>
            <th>Email</th>
            <th>Tel.Fixo</th>
            <th>Tel.Celular</th>
            <th>Nascimento</th>
            <th>Cargo</th>            
            <th class="text-center"><a class="btn btn-outline-success btn-sm" href="inicio.php?menuop=funcionarioscadastrar"><i class="bi bi-person-plus-fill"></i> Novo Funcionário</a></th>
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
            $query = "SELECT * FROM funcionarios WHERE id='{$txtPesquisa}' OR status LIKE '%{$txtPesquisa}%' OR nome LIKE '%{$txtPesquisa}%' OR cpf LIKE '%{$txtPesquisa}%' OR email LIKE '%{$txtPesquisa}%' OR telcelular LIKE '%{$txtPesquisa}%' OR datanascimento LIKE '%{$txtPesquisa}%' OR cargo LIKE '%{$txtPesquisa}%' ORDER BY nome ASC LIMIT $inicio, $quantidade";
            $queryfuncionarios = mysqli_query($conexao,$query) or die("Erro ao executar a consulta!" .mysqli_error($conexao));
            while($dados = mysqli_fetch_assoc($queryfuncionarios)){
        ?>
            <tr>
                <td class="text-nowrap"><?=$dados["id"]?></td>
                <td class="text-nowrap"><?=$dados["status"]?></td>
                <td class="text-nowrap"><?=$dados["nome"]?></td>
                <td class="text-nowrap"><?=$dados["cpf"]?></td>
                <td class="text-nowrap"><?=$dados["email"]?></td>
                <td class="text-nowrap"><?=$dados["telfixo"]?></td>
                <td class="text-nowrap"><?=$dados["telcelular"]?></td>
                <td class="text-nowrap"><?=date('d/m/Y',strtotime($dados["datanascimento"]))?></td>
                <td class="text-nowrap"><?=$dados["cargo"]?></td>
                <td class="text-nowrap text-center">
                    <a class="btn btn-outline-warning btn-sm" href="inicio.php?menuop=funcionarioseditar&id=<?=$dados["id"]?>"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-outline-danger btn-sm" href="inicio.php?menuop=funcionariosexcluir&id=<?=$dados["id"]?>"><i class="bi bi-trash3"></i></a>
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
    $queryTotal = "SELECT id FROM funcionarios";
    $queryId = mysqli_query($conexao, $queryTotal) or die(mysqli_error($conexao));
    $numTotal = mysqli_num_rows($queryId);
    $totalPagina = ceil($numTotal / $quantidade);
    echo "<li class='page-item'><span class='page-link'>Registros: " . $numTotal . "</span></li>";
    //LINK PRIMEIRA PAGINA
    echo ' <li class="page-item"><a class="page-link" href="?menuop=funcionarioslistar&pagina=1">Primeira</a></li> ';
    //CONDICAO PARA MOSTRAR NAVEGACAO ANTERIOR
    if($pagina>11){
?>
        <li class="page-item"><a class="page-link" href="?menuop=funcionarioslistar&pagina=<?php echo $pagina-1 ?>"> << </a></li>
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
                echo " <li class='page-item'><a class='page-link' href=\"?menuop=funcionarioslistar&pagina={$i}\">{$i}</a></li> ";
            }
        }
    }
    //CONDICAO PARA MOSTRAR NAVEGACAO PROXIMA
    if($pagina<($totalPagina-10)){
    ?>
        <li class="page-item"><a class="page-link" href="?menuop=funcionarioslistar&pagina=<?php echo $pagina+1 ?>"> >> </a></li>
    <?php
    }
    //LINK ULTIMA PAGINA
        echo " <li class='page-item'><a class='page-link' href=\"?menuop=funcionarioslistar&pagina=$totalPagina\">Última</a></li> ";
    ?>
</ul>