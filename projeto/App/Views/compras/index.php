<?php

use App\Models\Compra;
use App\Widgets\BaseWidget;

$breadcumb = [
    [
        'title' => 'Compras',
        'url'   => '/compra',
    ]
];

BaseWidget::breadcumb('Compras', $breadcumb);

?>

<div class="card">
    <div class="card-header">

        <div class="row">
            <div class="col align-self-left pt-1">
                <h4>Listagem de Compras</h4>
            </div>
            <div class="col align-self-right text-right">
                <a class="btn btn-primary" href="/compra/cadastro"><i class="fa fa-plus-circle"></i> Nova Compra</a>
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
                <?php foreach ($compras as $compra): ?>
                    <tr>
                        <td><?= $compra->id ?></td>
                        <td><?= $compra->cliente->nome ?></td>
                        <td><?= $compra->produto->nome ?></td>
                        <td><?= $compra->quantidade ?></td>
                        <td><?= $compra->getTotalFormatado() ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($compra->created_at)) ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="/compra/editar/<?= $compra->id ?>"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm"href="/compra/remover/<?= $compra->id ?>"><i class="fa fa-trash"></i></a>
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
                    <th><?= sprintf('R$ %s', number_format($compras->sum('total'), 2, ',', '.')) ?></th>
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