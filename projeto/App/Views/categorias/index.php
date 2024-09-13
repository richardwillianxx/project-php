<?php

use App\Models\Produto;
use App\Widgets\BaseWidget;

$breadcumb = [
    [
        'title' => 'Categorias',
        'url'   => '/categorias',
    ]
];

BaseWidget::breadcumb('Categorias', $breadcumb);

?>

<div class="card">
    <div class="card-header">

        <div class="row">
            <div class="col align-self-left pt-1">
                <h4>Listagem de Categorias</h4>
            </div>
            <div class="col align-self-right text-right">
                <a class="btn btn-primary" href="/categorias/cadastro"><i class="fa fa-plus-circle"></i> Nova Categoria</a>
            </div>
        </div>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $categoria): ?>
                    <tr>
                        <td><?= $categoria->id ?></td>
                        <td><?= $categoria->nome ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="/categorias/editar/<?= $categoria->id ?>"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm"href="/categorias/remover/<?= $categoria->id ?>"><i class="fa fa-trash"></i></a>
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