<!--CONTAINER-->
<div class="container-fluid">
<br>
<!--CABECALHO-->
<header>
    <h4><i class="bi bi-buildings-fill"></i> Empresa</h4>
</header>
<!--BOTAO LINK CADASTRAR-->
<div class="mb-2">
</div>
<!--TABELA-->
<div class="tabela table-responsive">
<table class="table table-hover table-sm">
    <!--CABECALHO TABELA-->
    <thead>
        <tr>
            <th>Cód</th>
            <th>Razão Social</th>
            <th>Nome Fantasia</th>
            <th>Cnpj</th>
            <th>Email</th>
            <th>Tel.Fixo</th>
            <th>Tel.Celular</th>
            <th>Data Abertura</th>
            <th>Data Cadastro</th>   
            <th>Data Alteração</th>            
            <th class="text-center"><a class="btn btn-outline-success btn-sm" href="inicio.php?menuop=empresacadastrar"><i class="bi bi-buildings-fill"></i> Nova Empresa</a></th>
        </tr>
    </thead>
    <!--CORPO TABELA-->
    <tbody>
        <!--CODIGO PHP-->
        <?php
            //SELECT PARA BUSCAR OS DADOS NO BANCO
            $query = "SELECT * FROM empresa ORDER BY id ASC";
            $queryfuncionarios = mysqli_query($conexao,$query) or die("Erro ao executar a consulta!" .mysqli_error($conexao));
            while($dados = mysqli_fetch_assoc($queryfuncionarios)){
        ?>
            <tr>
                <td class="text-nowrap"><?=$dados["id"]?></td>
                <td class="text-nowrap"><?=$dados["nomerazaosocial"]?></td>
                <td class="text-nowrap"><?=$dados["nomefantasia"]?></td>
                <td class="text-nowrap"><?=$dados["cnpj"]?></td>
                <td class="text-nowrap"><?=$dados["email"]?></td>
                <td class="text-nowrap"><?=$dados["telfixo"]?></td>
                <td class="text-nowrap"><?=$dados["telcelular"]?></td>
                <td class="text-nowrap"><?=date('d/m/Y',strtotime($dados["dataabertura"]))?></td>
                <td class="text-nowrap"><?=date('d/m/Y',strtotime($dados["datacadastro"]))?></td>
                <td class="text-nowrap"><?=date('d/m/Y',strtotime($dados["dataalteracao"]))?></td>
                <td class="text-nowrap text-center">
                    <a class="btn btn-outline-warning btn-sm" href="inicio.php?menuop=empresaeditar&id=<?=$dados["id"]?>"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-outline-danger btn-sm" href="inicio.php?menuop=empresaexcluir&id=<?=$dados["id"]?>"><i class="bi bi-trash3"></i></a>
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