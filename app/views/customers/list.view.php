<?php

use System\Common; ?>
<div class="row justify-content-center">
    <div class="col-12">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2 class="text-center text-uppercase">Clientes</h2>
            </div>
        </div>
        <div class="row justify-content-end mt-3">
            <div class="col-md-12">
                <a href="<?= SITE_URL; ?>/customers/register" class="btn btn-success btn-sm px-3 float-right"><i class="fas fa-plus"></i> Novo</a>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-12 col-xl-12 col-md-12 table-responsive table-responsive-sm table-responsive-md table-responsive-xs">
                <table class="table table-striped table-inverse">
                    <thead class="thead-inverse">
                        <tr class="text-dark text-center text-uppercase">
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                            <th>Celular</th>
                            <th>Cidade</th>
                            <th>CEP</th>
                            <th>Endereço</th>
                            <th>Número</th>
                            <th>Bairro</th>
                            <th colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($this->customers[0]['id']) && is_array($this->customers) && count($this->customers)) : ?>
                            <?php foreach ($this->customers as $customer) : ?>
                                <tr class="text-center">
                                    <td class="align-middle" scope="row"><?= $customer['name']; ?></td>
                                    <td class="align-middle"><?= Common::formatCnpjCpf($customer['cpf']); ?></td>
                                    <td class="align-middle"><?= $customer['email'] ?? '-'; ?></td>
                                    <td class="align-middle"><?= $customer['cellphone'] ?? '-'; ?></td>
                                    <td class="align-middle"><?= $customer['city'] ?? '-'; ?> </td>
                                    <td class="align-middle cep"><?= Common::mask($customer['zipCode']) ?? '-'; ?> </td>
                                    <td class="align-middle"><?= $customer['address'] ?? '-'; ?> </td>
                                    <td class="align-middle"><?= $customer['number'] ?? '-'; ?> </td>
                                    <td class="align-middle"><?= $customer['neighborhood'] ?? '-'; ?> </td>
                                    <td class="align-middle text-center">
                                        <a class="btn btn-sm btn-success px-2 edit-customer" href="<?= SITE_URL; ?>/customers/edit/<?= $customer['id']; ?>">
                                            <i class="far fa-edit"></i> Editar
                                        </a>
                                        <a class="btn btn-sm btn-danger px-2 delete-customer" data-id="<?= $customer['id']; ?>" data-name="<?= $customer['name']; ?>" data-cpf="<?= $customer['cpf']; ?>">
                                            <i class="far fa-trash-alt"></i> Excluir
                                        </a>
                                    </td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr class="text-center">
                                <td class="text-uppercase" colspan="9">Nenhum cliente encontrado!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
