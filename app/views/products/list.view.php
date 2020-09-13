<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="row justify-content-center mt-3">
            <div class="col-md-12 text-center">
                <h2>Lista de Produtos</h2>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-xl-12 col-md-12 table-responsive-sm table-responsive-md">
                <table class="table table-striped table-inverse">
                    <thead class="thead-inverse">
                        <tr class="text-dark text-center text-uppercase">
                            <th>Código Produto</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Data de Validade</th>
                            <th>Descrição</th>
                            <th colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($this->products['error']) && is_array($this->products) && count($this->products)) : ?>
                            <?php foreach ($this->products as $product) : ?>
                                <tr class="text-center">
                                    <td class="align-middle" scope="row"><?= $product['productCode']; ?></td>
                                    <td class="align-middle"><?= $product['name']; ?></td>
                                    <td class="align-middle"><?= $product['price']; ?></td>
                                    <td class="align-middle"><?= $product['dateExpiration']; ?></td>
                                    <td class="align-middle"><?= $product['description']; ?> </td>
                                    <td class="align-middle text-center px-0 mx-0">
                                        <a class="btn btn-sm btn-success mr-sm-0" href="<?= SITE_URL; ?>/products/edit/<?= $product['id']; ?>"><i class="far fa-edit"></i> Editar</a>
                                    </td>
                                    <td class="align-middle text-center px-0">
                                        <a class="btn btn-sm btn-danger delete-product" data-id="<?= $product['id']; ?>"><i class="far fa-trash-alt"></i> Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr class="text-center">
                                <td class="text-uppercase" colspan="6">Nenhum produto encontrado!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
