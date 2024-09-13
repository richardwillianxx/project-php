<?php

use App\Models\Estoque;
use App\Widgets\BaseWidget;

/**
 * @var Estoque[] $estoques
 */

$breadcumb = [
    [
        'title' => 'Estoque',
        'url'   => '/estoques',
    ]
];

BaseWidget::breadcumb('estoques', $breadcumb);

?>

<div class="card">
    <div class="card-header">

        <div class="row">
            <div class="col align-self-left pt-1">
                <h4>Listagem de Estoque</h4>
            </div>
            <div class="col align-self-right text-right">
                <a class="btn btn-primary" href="/estoque/cadastro"><i class="fa fa-plus-circle"></i> Novo Estoque</a>
            </div>
        </div>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>produto_id</th>
                    <th>qtd</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estoques as $estoque): ?>
                    <tr>
                        <td><?= $estoque->id ?></td>
                        <td>
                            <?= $estoque->produto->nome ?>
                        </td>
                        <td><?= $estoque->quantidade ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="/estoque/editar/<?= $estoque->id ?>"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm"href="/estoque/remover/<?= $estoque->id ?>"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
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