<div class="row justify-content-center">
    <div class="col-12">
        <div class="row justify-content-center mb-3">
            <div class="col-auto">
                <h2 class="text-uppercase text-dark">Realizar venda</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 rounded py-2">
                <div class="row justify-content-center">
                    <div class="col-sm-auto col-md-auto col-xl-auto">
                        <h4 class="text-uppercase font-weight-bold">Buscar Produtos</h4>
                    </div>
                </div>
                <form method="POST">
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-9 col-sm-12 col-8">
                            <div class="row">
                                <input id="productId" name="id" type="hidden" class="form-control" />
                                <div class="col-md-3 col-sm-3">
                                    <label for="productCode" class="col-form-label">Código Produto</label>
                                    <input id="productCode" name="code" type="text" class="form-control" />
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="productName" class="col-form-label">Produto</label>
                                    <input id="productName" name="name" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="code" class="col-form-label">Código Produto</label>
                                    <input id="code" type="text" class="form-control" disabled />
                                </div>
                                <div class="col-md-7">
                                    <label for="name" class="col-form-label">Produto</label>
                                    <input id="name" type="text" class="form-control" disabled />
                                </div>
                                <div class="col-md-2">
                                    <label for="quantity" class="col-form-label">Qtde.</label>
                                    <input id="quantity" type="text" class="form-control" pattern="[0-9]{3}" disabled value="0" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="productPrice" class="col-form-label">Valor Unitário</label>
                                    <input id="productPrice" type="text" class="form-control money" disabled value="0" />
                                </div>
                                <div class="col-md-3">
                                    <label for="productPriceOff" class="col-form-label">Desconto</label>
                                    <input id="productPriceOff" type="text" class="form-control money" disabled value="0" />
                                </div>
                                <div class="col-md-3">
                                    <label for="totalValue" class="col-form-label">Valor Total</label>
                                    <input id="totalValue" type="text" class="form-control money" disabled value="0" />
                                </div>
                                <div class="col-md-3">
                                    <label for="productExpiration" class="col-form-label">Data de Validade</label>
                                    <input id="productExpiration" type="text" class="form-control" disabled />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="productDescription" class="col-form-label">Descrição Produto</label>
                                    <textarea id="productDescription" class="form-control" name="productDescription" rows="3" disabled></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-end mt-2">
                                <div class="col-sm-auto col-md-auto">
                                    <button id="btnAddProduct" type="button" class="btn btn-success btn-sm btn-block px-4" disabled><i class="fas fa-plus"></i> Incluir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-3 mb-3">
            <div class="col-10">
                <div class="table-responsive">
                    <table id="tableListItems" class="table">
                        <thead>
                            <tr class="font-weigth-bold text-center text-muted">
                                <th>Código</th>
                                <th>Produto</th>
                                <th>Qtde.</th>
                                <th>Valor</th>
                                <th>UN</th>
                                <th>Valor Desc.</th>
                                <th>Total Item</th>
                                <th>Remover</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <form id="frmSaleItems" method="POST" action="<?= SITE_URL; ?>/sales/finalizeSale"></form>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-auto col-sm-12 col-8">
                <button type="button" class="btn btn-warning text-uppercase cancel-sale btn-block btn-lg">Cancelar</button>
            </div>
            <div class="col-md-auto col-sm-12 col-8">
                <button type="button" class="btn btn-success text-uppercase submit-sale btn-block btn-lg">Finalizar</button>
            </div>
        </div>
    </div>
</div>
