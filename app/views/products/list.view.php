<?php

use System\Common; ?>
<div class="row justify-content-center">
    <div class="col-10">
        <div class="row">
            <div class="col-12 col-xl-12 col-md-12">
                <div class="row justify-content-center mt-3">
                    <div class="col-md-12 text-center">
                        <h2>Lista de Produtos</h2>
                    </div>
                </div>
                <div class="row justify-content-end mt-3">
                    <div class="col-md-12">
                        <a href="<?= SITE_URL; ?>/products/register" class="btn btn-success btn-sm px-3 float-right"><i class="fas fa-plus"></i> Novo</a>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-12 col-xl-12 col-md-12 table-responsive-sm table-responsive-md">
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
                                            <td class="align-middle" scope="row"><?= $product['productCode'] ?? '-'; ?></td>
                                            <td class="align-middle"><?= $product['name']; ?></td>
                                            <td class="align-middle"><?= $product['price'] ?? '-'; ?></td>
                                            <td class="align-middle"><?= Common::convertDateDataBaseToBr($product['dateExpiration']) ?? '-'; ?></td>
                                            <td class="align-middle text-justify"><?= $product['description'] ?? '-'; ?> </td>
                                            <td class="align-middle text-center">
                                                <a class="btn btn-sm btn-success mr-sm-0 px-2 mb-2" href="<?= SITE_URL; ?>/products/edit/<?= $product['id']; ?>">
                                                    <i class="far fa-edit"></i> Editar
                                                </a>
                                                <a class="btn btn-sm btn-danger delete-product" data-id="<?= $product['id']; ?>" data-name="<?= $product['name']; ?>">
                                                    <i class="far fa-trash-alt"></i> Excluir
                                                </a>
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
    </div>
</div>
