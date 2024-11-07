<!--CODIGO PHP PARA BUSCAR OS DADOS-->
<?php
    //SELECT DOS DADOS PELA URL ID
    $id = $_GET['id'];
    $query = "SELECT * FROM usuarios WHERE id = '{$id}'";
    $queryusuarios = mysqli_query($conexao,$query) or die("Erro ao recuperar os dados do registro." . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($queryusuarios);
?>
<!--DIV DO FORMULARIO-->
<div class="container-fluid">
<br>
    <!--CABECALHO-->
    <header>
        <h4><i class="bi bi-person-check-fill"></i> Editar de Usuários</h4>
    </header>
    <!--FORMULARIO-->
    <form class="needs-validation" action="inicio.php?menuop=usuariosatualizaradmin" method="POST" novalidate>
        <div class="row">
            <!--ID-->
            <input class="form-control" type="hidden" name="id" value="<?=$dados["id"]?>" required>
            <!--STATUS-->
            <div class="mb-0 col-2">
                <label class="form-label mb-0" for="status">Status</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-check2-circle"></i></span>
                    <select class="form-select" name="status" id="status" maxlength="7" required>
                        <option <?php echo ($dados['status']=='Status')?'selected':''?>>Status</option>
                        <option <?php echo ($dados['status']=='Ativo')?'selected':''?>>Ativo</option>
                        <option <?php echo ($dados['status']=='Inativo')?'selected':''?>>Inativo</option>
                    </select>
                </div>           
            </div>
            <!--NOME-->
            <div class="mb-0 col-6">
                <label class="form-label mb-0" for="nome">Nome</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input class="form-control" type="text" id="nome" name="nome" maxlength="90" placeholder="Nome" value="<?=$dados["nome"]?>" required>
                </div>
            </div>
            <!--NIVEL ACESSO-->
            <div class="mb-0 col-4">
                <label class="form-label mb-0" for="status">Nível Acesso</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-check2-circle"></i></span>
                    <select class="form-select" name="nivelacesso" id="nivelacesso" maxlength="7" required>
                        <option <?php echo ($dados['nivelacesso']=='Nível Acesso')?'selected':''?>>Nível Acesso</option>
                        <option <?php echo ($dados['nivelacesso']=='Administrador')?'selected':''?>>Administrador</option>
                        <option <?php echo ($dados['nivelacesso']=='Gerente')?'selected':''?>>Gerente</option>
                        <option <?php echo ($dados['nivelacesso']=='Funcionário')?'selected':''?>>Funcionário</option>
                    </select>
                </div>           
            </div>
            <!--EMAIL-->
            <div class="mb-0 col-6">
                <label class="form-label mb-0" for="email">Email</label>
                <div class="input-group ">
                    <span class="input-group-text">@</span>
                    <input class="form-control" type="email" id="email" name="email" maxlength="90" placeholder="Email" value="<?=$dados["email"]?>" required>
                </div>
            </div>
            <!--EMAIL CONFIRMA-->
            <div class="mb-4 col-6">
                <label class="form-label mb-0" for="email">Email Confirma</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input class="form-control" type="emailconfirma" id="emailconfirma" name="emailconfirma" maxlength="90" placeholder="Email Confirma" value="<?=$dados["emailconfirma"]?>" required>
                </div>
            </div>
            <!--SENHA
            <div class="mb-0 col-6">
                <label class="form-label mb-0" for="senha">Senha</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input class="form-control" type="password" id="senha" name="senha" maxlength="90" placeholder="Senha" value="<?=$dados["senha"]?>" required>
                    <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
                </div>
            </div>-->
            <!--SENHA CONFIRMA
            <div class="mb-4 col-6">
                <label class="form-label mb-0" for="senhaconfirma">Senha Confirma</label>
                <div class="input-group ">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input class="form-control" type="password" id="senhaconfirma" name="senhaconfirma" maxlength="90" placeholder="Senha Confirma" value="<?=$dados["senhaconfirma"]?>" required>
                    <i class="bi bi-eye-fill" id="btn-senhaConfirma" onclick="mostrarSenhaConfirma()"></i>
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
                <a class="btn btn-outline-primary w-100" href="inicio.php?menuop=usuarioslistaradmin"><i class="bi bi-arrow-return-left"></i> Voltar</a>
            </div>
        </div>
    </form>
</div>