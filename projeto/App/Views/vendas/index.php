<?php

use App\Models\Venda;
use App\Widgets\BaseWidget;

$breadcumb = [
    [
        'title' => 'Vendas',
        'url'   => '/venda',
    ]
];

BaseWidget::breadcumb('Vendas', $breadcumb);

?>

<div class="card">
    <div class="card-header">

        <div class="row">
            <div class="col align-self-left pt-1">
                <h4>Listagem de Vendas</h4>
            </div>
            <div class="col align-self-right text-right">
                <a class="btn btn-primary" href="/venda/cadastro"><i class="fa fa-plus-circle"></i> Nova Venda</a>
            </div>
        </div>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>Data Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendas as $venda): ?>
                    <tr>
                        <td><?= $venda->id ?></td>
                        <td><?= $venda->cliente->nome ?></td>
                        <td><?= $venda->produto->nome ?></td>
                        <td><?= $venda->quantidade ?></td>
                        <td><?= $venda->getTotalFormatado() ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($venda->created_at)) ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="/venda/editar/<?= $venda->id ?>"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm"href="/venda/remover/<?= $venda->id ?>"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <thead>
                <tr>
                    <th>#</th>
                    <th>-</th>
                    <th>-</th>
                    <th>-</th>
                    <th><?= sprintf('R$ %s', number_format($vendas->sum('total'), 2, ',', '.')) ?></th>
                    <th>-</th>
                    <th>-</th>
                </tr>
            </thead>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>