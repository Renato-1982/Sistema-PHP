<!--DIV DO FORMULARIO-->
<div class="container-fluid"> 
<br>
    <!--CABECALHO-->
    <header>
        <h4><i class="bi bi-person-plus-fill"></i> Cadastro de Funcionário</h4>
    </header> 
    <!--FORMULARIO-->
    <form class="cadastro needs-validation" action="inicio.php?menuop=funcionariosinserir" method="POST" novalidate>
        <div class="row">
            <!--NOME-->
            <div class="mb-0 col-4">
                <label class="form-label mb-0" for="nome">Nome</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input class="form-control" type="text" id="nome" name="nome" maxlength="90" placeholder="Nome" required>
                </div>
            </div>
            <!--CPF-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="cpf">CPF</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-credit-card-2-front"></i></span>
                    <input class="form-control" type="text" id="cpf" name="cpf" maxlength="14" onkeypress="cpfMascara(this)" placeholder="CPF" required>
                </div>
            </div>
            <!--RG-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="rg">RG</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-credit-card-2-front"></i></span>
                    <input class="form-control" type="text" id="rg" name="rg" maxlength="14" placeholder="RG" required>
                </div>
            </div>
            <!--DATA NASCIMENTO-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="datanascimento">Data Nasc.</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input class="form-control" type="date" id="datanascimento" name="datanascimento" maxlength="10" required>
                </div>
            </div>
            <!--PIS-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="pis">PIS</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-credit-card-2-front"></i></span>
                    <input class="form-control" type="text" id="pis" name="pis" maxlength="11" placeholder="PIS" required>
                </div>
            </div>
            <!--CEP-->            
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="cep">CEP</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-pin-map"></i></span>
                    <input class="form-control" type="text" id="cep" name="cep" maxlength="10" onkeypress="cepMascara(this)" placeholder="CEP" required>
                </div>
            </div>
            <!--ENDERECO-->
            <div class="mb-0 col-5">
                <label class="form-label mb-0" for="endereco">Endereço</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input class="form-control" type="text" id="endereco" name="endereco" maxlength="90" placeholder="Endereço" required>
                </div>
            </div>
            <!--NUMERO-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="numero">Número</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-sort-numeric-up-alt"></i></span>
                    <input class="form-control" type="text" id="numero" name="numero" maxlength="20" placeholder="Nº" required>
                </div>
            </div>
            <!--COMPLEMENTO-->
            <div class="mb-0 col-3">
                <label class="form-label mb-0" for="complemento">Complemento</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input class="form-control" type="text" id="complemento" name="complemento" maxlength="90" placeholder="Complemento" required>
                </div>
            </div>
            <!--BAIRRO-->            
            <div class="mb-0 col-5">
                <label class="form-label mb-0" for="bairro">Bairro</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input class="form-control" type="text" id="bairro" name="bairro" maxlength="90" placeholder="Bairro" required>
                </div>
            </div>
            <!--CIDADE-->            
            <div class="mb-0 col-5">
                <label class="form-label mb-0" for="cidade">Cidade</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input class="form-control" type="text" id="cidade" name="cidade" maxlength="90" placeholder="Cidade" required>
                </div>
            </div>
            <!--ESTADO-->            
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="estado">Estado</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input class="form-control" type="text" id="estado" name="estado" maxlength="2" placeholder="UF" required>
                </div>
            </div>
            <!--TEL.FIXO--> 
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="telfixo">Tel.Fixo</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                    <input class="form-control" type="text" id="telfixo" name="telfixo" maxlength="13" onkeypress="telfixoMascara(this)" placeholder="Telefone Fixo" required>
                </div>
            </div>
            <!--TEL.CELULAR--> 
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="telcelular">Tel.Celular</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                    <input class="form-control" type="text" id="telcelular" name="telcelular" maxlength="15" onkeypress="telcelularMascara(this)" placeholder="Telefone Celular" required>
                </div>
            </div>
            <!--EMAIL-->
            <div class="mb-0 col-8">
                <label class="form-label mb-0" for="email">Email</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text">@</span>
                    <input class="form-control" type="email" id="email" name="email" maxlength="90" placeholder="Email" required>
                </div>
            </div>
            <!--CARGO.--> 
            <div class="mb-0 col-4">
                <label class="form-label mb-0" for="cargo">Cargo</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-diagram-3"></i></span>
                    <input class="form-control" type="text" id="cargo" name="cargo" maxlength="90" placeholder="Cargo" required>
                </div>
            </div>
            <!--DATA ADMISSAO-->
            <div class="mb-4 col-2">
                <label class="form-label mb-0" for="dataadmissao">Data Admissão</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input class="form-control" type="date" id="dataadmissao" name="dataadmissao" maxlength="10" required>
                </div>
            </div>
            <!--DATA RESCISAO
            <div class="mb-2 col-2">
                <label class="form-label mb-0" for="datarescisao">Data Rescisão</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input class="form-control" type="date" id="datarescisao" name="datarescisao" maxlength="10" required>
                </div>
            </div>-->
        </div>
        <div class="row">
            <!--BOTAO-->
            <div class="mb-2 col-2">
                <input class="btn btn-outline-success w-100" type="submit" value="Adicionar" name="btnAdicionar">
            </div>
            <!--BOTAO-->
            <div class="mb-2 col-2">
                <a class="btn btn-outline-primary w-100" href="inicio.php?menuop=funcionarioslistar"><i class="bi bi-arrow-return-left"></i> Voltar</a>
            </div>
        </div>
    </form>
</div>