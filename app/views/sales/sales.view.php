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
                <div class="row justify-content-center mb-4">
                    <div class="col-md-8">
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="productCode" class="col-md-auto col-form-label">Código Produto</label>
                                    <input type="text" class="form-control" id="productCode" />
                                </div>
                                <div class="col-md-6">
                                    <label for="productName" class="col-md-auto col-form-label">Produto</label>
                                    <input type="text" class="form-control" id="productName" />
                                </div>
                                <div class="col-md-2">
                                    <label for="productPrice" class="col-md-auto col-form-label">Valor Unitário</label>
                                    <input type="text" class="form-control" id="productPrice" readonly />
                                </div>
                                <div class="col-md-1">
                                    <label for="quantity" class="col-md-auto col-form-label">Qtde.</label>
                                    <input type="text" class="form-control" id="quantity" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="productPriceOff" class="col-md-auto col-form-label">Desconto</label>
                                    <input type="text" class="form-control" id="productPriceOff" />
                                </div>
                                <div class="col-md-3">
                                    <label for="productPriceOffPerc" class="col-md-auto col-form-label">Desconto %</label>
                                    <input type="text" class="form-control" id="productPriceOffPerc" />
                                </div>
                                <div class="col-md-3">
                                    <label for="totalValue" class="col-md-auto col-form-label">Valor Total</label>
                                    <input type="text" class="form-control" id="totalValue" />
                                </div>
                                <div class="col-md-3">
                                    <label for="productExpiration" class="col-md-auto col-form-label">Data de Validade</label>
                                    <input type="text" class="form-control" id="productExpiration" readonly />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="productDescription" class="col-md-auto col-form-label">Descrição Produto</label>
                                    <textarea class="form-control" name="productDescription" id="productDescription" rows="3" readonly></textarea>
                                </div>
                            </div>
                        </form>
                        <div class="row justify-content-end mt-2">
                            <div class="col-sm-auto col-md-auto">
                                <button id="btnAddProduct" type="button" class="btn btn-success btn-sm btn-block px-4"><i class="fas fa-plus"></i> Incluir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-10">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
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
                            <tr>
                                <td scope="row">25548</td>
                                <td>Laranja</td>
                                <td>1</td>
                                <td>2.358,98</td>
                                <td>Kg</td>
                                <td>0,00</td>
                                <td>2.358,98</td>
                                <td><i class="far fa-trash-alt"></i></td>
                            </tr>
                            <tr>
                                <td scope="row">69854</td>
                                <td>Abacaxi</td>
                                <td>2</td>
                                <td>5,90</td>
                                <td>Kg</td>
                                <td>0,00</td>
                                <td>11,80</td>
                                <td><i class="far fa-trash-alt"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
