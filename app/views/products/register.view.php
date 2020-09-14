<div class="row justify-content-center">
    <div class="col-8">
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-center mt-3 mb-4">
                    <div class="col-md-auto">
                        <h2><?= $this->action === 'edit' ? 'Editar' : 'Cadastrar'; ?> Produto</h2>
                    </div>
                </div>
                <form id="form<?= $this->action === 'edit' ? 'Edit' : 'Register'; ?>Product" method="POST">
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-3">
                            <label for="productCode">Código Produto</label>
                            <input type="text" class="form-control" name="productCode" id="productCode" aria-describedby="productCodeHelp" placeholder="xxxxxxxx" value="<?= $this->product['productCode'] ?? null; ?>" maxlength="8" />
                            <small id="productCodeHelp" class="form-text text-muted">Código de cadastro do produto</small>
                        </div>
                        <div class="col-md-9">
                            <label for="productName">Nome do Produto</label>
                            <input type="text" class="form-control" name="productName" id="productName" aria-describedby="productNameHelp" placeholder="Ex: Laranja, Maçã, Pêssego" value="<?= $this->product['name'] ?? null; ?>" required />
                            <small id="productNameHelp" class="form-text text-muted">Nome do Produto</small>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-6">
                            <label for="productPrice">Preço do Produto</label>
                            <input type="text" class="form-control" name="productPrice" id="productPrice" value="<?= $this->product['price'] ?? null; ?>" />
                        </div>
                        <div class="col-md-6">
                            <label for="productExpiration">Data de Validade</label>
                            <input type="text" class="form-control" name="productExpiration" id="productExpiration" value="<?= $this->product['dateExpiration'] ?? null; ?>" />
                        </div>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-12">
                            <label for="productDescription">Descrição do produto</label>
                            <textarea class="form-control" name="productDescription" id="productDescription" rows="4" placeholder="Informações pertinentes sobre o produto"><?= $this->product['description'] ?? null; ?></textarea>
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
