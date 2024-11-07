<!--CODIGO PHP PARA BUSCAR OS DADOS-->
<?php
    //SELECT DOS DADOS PELA URL ID
    $id = $_GET['id'];
    $query = "SELECT * FROM empresa WHERE id = '{$id}'";
    $queryempresa = mysqli_query($conexao,$query) or die("Erro ao recuperar os dados do registro." . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($queryempresa);
?>
<!--DIV DO FORMULARIO-->
<div class="container-fluid"> 
<br>
    <!--CABECALHO-->
    <header>
        <h4><i class="bi bi-buildings-fill"></i> Editar Empresa</h4>
    </header> 
    <!--FORMULARIO-->
    <form class="cadastro needs-validation" action="inicio.php?menuop=empresaatualizar" method="POST" novalidate>
        <div class="row">
            <!--ID-->
            <input class="form-control" type="hidden" name="id" value="<?=$dados["id"]?>" required>
            <!--NOME RAZAO-->
            <div class="mb-0 col-4">
                <label class="form-label mb-0" for="nomerazaosocial">Razão Social</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input class="form-control" type="text" id="nomerazaosocial" name="nomerazaosocial" maxlength="90" placeholder="Razão Social" value="<?=$dados["nomerazaosocial"]?>" required>
                </div>
            </div>
            <!--NOME FANTASIA-->
            <div class="mb-0 col-4">
                <label class="form-label mb-0" for="nomefantasia">Nome Fantasia</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input class="form-control" type="text" id="nomefantasia" name="nomefantasia" maxlength="90" placeholder="Nome Fantasia" value="<?=$dados["nomefantasia"]?>" required>
                </div>
            </div>
            <!--CNPJ-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="cnpj">CNPJ</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-credit-card-2-front"></i></span>
                    <input class="form-control" type="text" id="cnpj" name="cnpj" maxlength="18" onkeypress="cnpjMascara(this)" placeholder="CNPJ" value="<?=$dados["cnpj"]?>" required>
                </div>
            </div>
            <!--DATA ABERTURA-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="dataabertura">Início Atividade</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input class="form-control" type="date" id="dataabertura" name="dataabertura" maxlength="10" value="<?=$dados["dataabertura"]?>" required>
                </div>
            </div>
            <!--CEP-->            
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="cep">CEP</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-pin-map"></i></span>
                    <input class="form-control" type="text" id="cep" name="cep" maxlength="10" onkeypress="cepMascara(this)" placeholder="CEP" value="<?=$dados["cep"]?>" required>
                </div>
            </div>
            <!--ENDERECO-->
            <div class="mb-0 col-5">
                <label class="form-label mb-0" for="endereco">Endereço</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input class="form-control" type="text" id="endereco" name="endereco" maxlength="90" placeholder="Endereço" value="<?=$dados["endereco"]?>" required>
                </div>
            </div>
            <!--NUMERO-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="numero">Número</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-sort-numeric-up-alt"></i></span>
                    <input class="form-control" type="text" id="numero" name="numero" maxlength="20" placeholder="Número" value="<?=$dados["numero"]?>" required>
                </div>
            </div>
            <!--COMPLEMENTO-->
            <div class="mb-0 col-3">
                <label class="form-label mb-0" for="complemento">Complemento</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input class="form-control" type="text" id="complemento" name="complemento" maxlength="90" placeholder="Complemento" value="<?=$dados["complemento"]?>" required>
                </div>
            </div>
            <!--BAIRRO-->            
            <div class="mb-0 col-5">
                <label class="form-label mb-0" for="bairro">Bairro</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input class="form-control" type="text" id="bairro" name="bairro" maxlength="90" placeholder="Bairro" value="<?=$dados["bairro"]?>" required>
                </div>
            </div>
            <!--CIDADE-->            
            <div class="mb-0 col-5">
                <label class="form-label mb-0" for="cidade">Cidade</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input class="form-control" type="text" id="cidade" name="cidade" maxlength="90" placeholder="Cidade" value="<?=$dados["cidade"]?>" required>
                </div>
            </div>
            <!--ESTADO-->            
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="estado">Estado</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input class="form-control" type="text" id="estado" name="estado" maxlength="2" placeholder="UF" value="<?=$dados["estado"]?>" required>
                </div>
            </div>
            <!--TEL.FIXO--> 
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="telfixo">Tel.Fixo</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                    <input class="form-control" type="text" id="telfixo" name="telfixo" maxlength="13" onkeypress="telfixoMascara(this)" placeholder="Telefone Fixo" value="<?=$dados["telfixo"]?>" required>
                </div>
            </div>
            <!--TEL.CELULAR--> 
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="telcelular">Tel.Celular</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                    <input class="form-control" type="text" id="telcelular" name="telcelular" maxlength="15" onkeypress="telcelularMascara(this)" placeholder="Telefone Celular" value="<?=$dados["telcelular"]?>" required>
                </div>
            </div>
            <!--EMAIL-->
            <div class="mb-4 col-8">
                <label class="form-label mb-0" for="email">Email</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">@</span>
                    <input class="form-control" type="email" id="email" name="email" maxlength="90" placeholder="Email" value="<?=$dados["email"]?>" required>
                </div>
            </div>
            <!--DATA CADASTRO
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="datacadastro">Data Cadastro</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input class="form-control" type="date" id="datacadastro" name="datacadastro" maxlength="10" value="<?=$dados["datacadastro"]?>" required>
                </div>
            </div>-->
            <!--DATA ALTERAÇÃO
            <div class="mb-2 col-2">
                <label class="form-label mb-0" for="dataalteracao">Data Alteraação</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input class="form-control" type="date" id="dataalteracao" name="dataalteracao" maxlength="10" value="<?=$dados["dataalteracao"]?>" required>
                </div>
            </div>-->
        </div>
        <div class="row">
        <!--BOTAO-->
            <div class="mb-2 col-2">
                <input class="btn btn-outline-primary w-100" type="submit" value="Atualizar" name="btnAtualizar">
            </div>
            <!--BOTAO-->
            <div class="mb-2 col-2">
                <a class="btn btn-outline-primary w-100" href="inicio.php?menuop=empresalistar"><i class="bi bi-arrow-return-left"></i> Voltar</a>
            </div>
        </div>
    </form>
</div>