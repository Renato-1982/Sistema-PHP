<!--CODIGO PHP PARA BUSCAR OS DADOS-->
<?php
    //SELECT DOS DADOS PELA URL ID
    $id = $_GET['id'];
    $query = "SELECT * FROM funcionarios WHERE id = '{$id}'";
    $queryfuncionarios = mysqli_query($conexao,$query) or die("Erro ao recuperar os dados do registro." . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($queryfuncionarios);
?>
<!--DIV DO FORMULARIO-->
<div class="container-fluid">
<br>
    <!--CABECALHO-->
    <header>
        <h4><i class="bi bi-person-check-fill"></i> Editar Funcionário</h4>
    </header>
    <!--FORMULARIO-->
    <form class="needs-validation" action="inicio.php?menuop=funcionariosatualizar" method="POST" novalidate>
        <div class="row">
            <!--ID-->
            <input class="form-control" type="hidden" name="id" value="<?=$dados["id"]?>" required>
            <!--STATUS-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="status">Status</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-check2-circle"></i></span>
                    <select class="form-select" name="status" id="status" maxlength="7" required>
                        <option <?php echo ($dados['status']=='Status')?'selected':''?>>Status</option>
                        <option <?php echo ($dados['status']=='Ativo')?'selected':''?>>Ativo</option>
                        <option <?php echo ($dados['status']=='Inativo')?'selected':''?>>Inativo</option>
                    </select>
                </div>           
            </div>
            <!--NOME-->
            <div class="mb-0 col-4">
                <label class="form-label mb-0" for="nome">Nome</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input class="form-control" type="text" id="nome" name="nome" maxlength="90" placeholder="Nome" value="<?=$dados["nome"]?>" required>
                </div>
            </div>
            <!--CPF-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="cpf">CPF</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-credit-card-2-front"></i></span>
                    <input class="form-control" type="text" id="cpf" name="cpf" maxlength="14" onkeypress="cpfMascara(this)" placeholder="CPF" value="<?=$dados["cpf"]?>" required>
                </div>
            </div>
            <!--RG-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="rg">RG</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-credit-card-2-front"></i></span>
                    <input class="form-control" type="text" id="rg" name="rg" maxlength="14" placeholder="RG" value="<?=$dados["rg"]?>" required>
                </div>
            </div>
            <!--DATA NASCIMENTO-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="datanascimento">Data Nasc.</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input class="form-control" type="date"id="datanascimento" name="datanascimento" maxlength="10" value="<?=$dados["datanascimento"]?>" required>
                </div>
            </div>
            <!--PIS-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="pis">PIS</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-credit-card-2-front"></i></span>
                    <input class="form-control" type="text" id="pis" name="pis" maxlength="11" placeholder="PIS" value="<?=$dados["pis"]?>" required>
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
            <div class="mb-0 col-6">
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
                    <input class="form-control" type="text" id="numero" name="numero" maxlength="20" placeholder="Nº" value="<?=$dados["numero"]?>" required>
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
            <div class="mb-0 col-4">
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
            <div class="mb-0 col-6">
                <label class="form-label mb-0" for="email">Email</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">@</span>
                    <input class="form-control" type="email" id="email" name="email" maxlength="90" placeholder="Email" value="<?=$dados["email"]?>" required>
                </div>
            </div>
            <!--CARGO.--> 
            <div class="mb-0 col-4">
                <label class="form-label mb-0" for="cargo">Cargo</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-diagram-3"></i></span>
                    <input class="form-control" type="text" id="cargo" name="cargo" maxlength="90" placeholder="Cargo" value="<?=$dados["cargo"]?>" required>
                </div>
            </div>
            <!--DATA ADMISSAO-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="dataadmissao">Data Admissão</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input class="form-control" type="date" id="dataadmissao" name="dataadmissao" maxlength="10" value="<?=$dados["dataadmissao"]?>" required>
                </div>
            </div>
            <!--DATA RESCISAO-->
            <div class="mb-4 col-2">
                <label class="form-label mb-0" for="datarescisao">Data Rescisão</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input class="form-control" type="date" id="datarescisao" name="datarescisao" maxlength="10" value="<?=$dados["datarescisao"]?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            <!--BOTAO-->
            <div class="mb-2 col-2">
                <input class="btn btn-outline-primary w-100" type="submit" value="Atualizar" name="btnAtualizar">
            </div>
            <!--BOTAO-->
            <div class="mb-2 col-2">
                <a class="btn btn-outline-primary w-100" href="inicio.php?menuop=funcionarioslistar"><i class="bi bi-arrow-return-left"></i> Voltar</a>
            </div>
        </div>
    </form>
</div>