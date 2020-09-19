<?php

use System\Common; ?>
<div class="row justify-content-center">
    <div class="col-8">
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-center mt-3 mb-2">
                    <div class="col-md-auto">
                        <h2><?= $this->action === 'edit' ? 'Editar' : 'Cadastrar'; ?> Cliente</h2>
                    </div>
                </div>
                <div class="row justify-content-start mt-3 mb-4">
                    <div class="col-md-3">
                        <a class="btn btn-sm btn-info px-3" href="<?= SITE_URL; ?>/customers/list">Voltar</a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-12">
                        <form id="form<?= $this->action === 'edit' ? 'Update' : 'Register'; ?>Customer" method="POST">
                            <?php if ($this->action === 'edit') : ?>
                                <input type="hidden" id="customerId" name="customerId" value="<?= Common::encryptDecryptData($this->customer['id']); ?>">
                            <?php endif; ?>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-8">
                                    <label for="customerName">Nome</label>
                                    <input type="text" class="form-control" name="customerName" id="customerName" placeholder="Ex.: Fulano da Silva" value="<?= $this->customer['name'] ?? null; ?>" required />
                                </div>
                                <div class="col-md-4">
                                    <label for="customerCpf">CPF</label>
                                    <input type="text" class="form-control" name="customerCpf" id="customerCpf" placeholder="000.000.000-00" value="<?= $this->customer['cpf'] ?? null; ?>" required />
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-2">
                                    <label for="customerDateBirth">Nascimento</label>
                                    <input type="text" class="form-control" name="customerDateBirth" id="customerDateBirth" value="<?= $this->customer['dateBirth'] ?? null; ?>" />
                                </div>
                                <div class="col-md-10">
                                    <label for="customerEmail">E-mail</label>
                                    <input type="email" class="form-control" name="customerEmail" id="customerEmail" value="<?= $this->customer['email'] ?? null; ?>" />
                                </div>
                            </div>
                            <div class="row justify-content-center mb-4">
                                <div class="col-md-3">
                                    <label for="customerCep">CEP</label>
                                    <input type="text" class="form-control" name="customerCep" id="customerCep" value="<?= $this->customer['zipCode'] ?? null; ?>" />
                                </div>
                                <div class="col-md-2">
                                    <label for="customerUf">UF</label>
                                    <input type="text" class="form-control" name="customerUf" id="customerUf" value="<?= $this->customer['state'] ?? null; ?>" />
                                </div>
                                <div class="col-md-7">
                                    <label for="customerCity">Cidade</label>
                                    <input type="text" class="form-control" name="customerCity" id="customerCity" value="<?= $this->customer['city'] ?? null; ?>" />
                                </div>
                            </div>
                            <div class="row justify-content-center mb-4">
                                <div class="col-md-6">
                                    <label for="customerAddress">Endereço</label>
                                    <input type="text" class="form-control" name="customerAddress" id="customerAddress" value="<?= $this->customer['address'] ?? null ?>" />
                                </div>
                                <div class="col-md-6">
                                    <label for="customerComplement">Complemento</label>
                                    <input type="text" class="form-control" name="customerComplement" id="customerComplement" value="<?= $this->customer['complement'] ?? null ?>" />
                                </div>
                            </div>
                            <div class="row justify-content-center mb-4">
                                <div class="col-md-5">
                                    <label for="customerCellphone">Celular</label>
                                    <input type="text" class="form-control" name="customerCellphone" id="customerCellphone" value="<?= $this->customer['cellphone'] ?? null ?>" required />
                                </div>
                                <div class="col-md-2">
                                    <label for="customerGender">Gênero</label>
                                    <input type="text" class="form-control" name="customerGender" id="customerGender" value="<?= $this->customer['gender'] ?? null ?>" />
                                </div>
                                <div class="col-md-5">
                                    <label for="customerContact">Contato</label>
                                    <input type="text" class="form-control" name="customerContact" id="customerContact" value="<?= $this->customer['contact'] ?? null ?>" />
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-6">
                                    <button id="btnRegisterUpdateProduct" type="button" class="btn btn-success btn-block"> <?= $this->action === 'edit' ? 'Atualizar' : 'Cadastrar'; ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
