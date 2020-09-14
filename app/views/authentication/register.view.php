<div class="row justify-content-center">
    <div class="col-6">
        <form id="frmRegister" method="POST">
            <div class="row justify-content-start mb-4">
                <div class="col-md-auto">
                    <a class="btn btn-sm btn-info" href="<?= SITE_URL; ?>/auth/login">Voltar</a>
                </div>
            </div>
            <div class="row justify-content-center mb-4">
                <div class="col-md-auto">
                    <h2>Cadastro de Usuários</h2>
                </div>
            </div>
            <div class="row justify-content-center mb-2">
                <div class="col-md-2">
                    <label for="login">Login:</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="login" id="login" required maxlength="60" />
                </div>
            </div>
            <div class="row justify-content-center mb-2">
                <div class="col-md-2">
                    <label for="password">Senha:</label>
                </div>
                <div class="col-md-10">
                    <input type="password" class="form-control" name="password" id="password" required maxlength="16" />
                </div>
            </div>
            <div class="row justify-content-center mb-4">
                <div class="col-md-2">
                    <label for="passwordConfirmation">Confirme a senha:</label>
                </div>
                <div class="col-md-10">
                    <input type="password" class="form-control" name="passwordConfirmation" id="passwordConfirmation" required maxlength="16" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button id="btnUserRegister" type="button" class="btn btn-success btn-block float-right mb-2">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
