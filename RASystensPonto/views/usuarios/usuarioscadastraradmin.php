<!--DIV DO FORMULARIO-->
<div class="container-fluid"> 
<br>
    <!--CABECALHO-->
    <header>
        <h4><i class="bi bi-person-plus-fill"></i> Cadastro de Usuários</h4>
    </header> 
    <!--FORMULARIO-->
    <form class="cadastro needs-validation" action="inicio.php?menuop=usuariosinseriradmin" method="POST" novalidate>
        <div class="row">
            <!--NOME-->
            <div class="mb-0 col-6">
                <label class="form-label mb-0" for="nome">Nome</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input class="form-control" type="text" id="nome" name="nome" maxlength="90" placeholder="Nome" required>
                </div>
            </div>
            <!--NIVEL ACESSO-->
            <div class="mb-0 col-6">
                <label class="form-label mb-0" for="status">Nível Acesso</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-check2-circle"></i></span>
                    <select class="form-select" name="nivelacesso" id="nivelacesso" maxlength="7" required>
                        <option selected value="">Nível Acesso</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Funcionario">Funcionário</option>
                    </select>
                </div>           
            </div>
            <!--EMAIL-->
            <div class="mb-0 col-6">
                <label class="form-label mb-0" for="email">Email</label>
                <div class="input-group ">
                    <span class="input-group-text">@</span>
                    <input class="form-control" type="email" id="email" name="email" maxlength="90" placeholder="Email" required>
                </div>
            </div>
            <!--EMAIL CONFIRMA-->
            <div class="mb-0 col-6">
                <label class="form-label mb-0" for="email">Email Confirma</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input class="form-control" type="emailconfirma" id="emailconfirma" name="emailconfirma" maxlength="90" placeholder="Email Confirma" required>
                </div>
            </div>
            <!--SENHA-->
            <div class="mb-0 col-6">
                <label class="form-label mb-0" for="senha">Senha</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input class="form-control" type="password" id="senha" name="senha" maxlength="90" placeholder="Senha" required>
                    <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
                </div>
            </div>
            <!--SENHA CONFIRMA-->
            <div class="mb-4 col-6">
                <label class="form-label mb-0" for="senhaconfirma">Senha Confirma</label>
                <div class="input-group ">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input class="form-control" type="password" id="senhaconfirma" name="senhaconfirma" maxlength="90" placeholder="Senha Confirma" required>
                    <i class="bi bi-eye-fill" id="btn-senhaConfirma" onclick="mostrarSenhaConfirma()"></i>
                </div>
            </div>
        </div>
        <div class="row">
            <!--BOTAO-->
            <div class="mb-2 col-2">
            <input class="btn btn-outline-success w-100" type="submit" value="Adicionar" name="btnAdicionar">
            </div>
            <!--BOTAO-->
            <div class="mb-2 col-2">
                <a class="btn btn-outline-primary w-100" href="inicio.php?menuop=usuarioslistaradmin"><i class="bi bi-arrow-return-left"></i> Voltar</a>
            </div>
        </div>
    </form>
</div>