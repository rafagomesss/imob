<div class="row">
    <div class="col-md-12">
        <div class="row justify-content-center mt-3">
            <div class="col-md-auto">
                <h2>Lista de Produtos</h2>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-inverse">
                        <thead class="thead-inverse">
                            <tr class="text-dark text-center text-uppercase">
                                <th>Código Produto</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Data de Validade</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($x = 1; $x <= 10; $x++) : ?>
                                <tr class="text-center">
                                    <td scope="row"><?= $x; ?>258 988<?= $x === 10 ? '' : 4; ?></td>
                                    <td>Laranja</td>
                                    <td>R$ 9,90</td>
                                    <td>31/12/2020</td>
                                    <td>Vitamina C</td>
                                    <td scope="row" class="row justify-content-center">
                                        <div class="col-auto mx-0 px-0 mb-1 mr-xl-2">
                                            <a class="btn btn-sm btn-success" href="#"><i class="far fa-edit"></i> Editar</a>
                                        </div>
                                        <div class="col-auto mx-0 px-0">
                                            <a class="btn btn-sm btn-danger" href="#"><i class="far fa-trash-alt"></i> Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
