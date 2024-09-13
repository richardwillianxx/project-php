<?php

use App\Models\Produto;
use App\Widgets\BaseWidget;

$breadcumb = [
    [
        'title' => 'Produtos',
        'url'   => '/produtos',
    ]
];

BaseWidget::breadcumb('Produtos', $breadcumb);

$produtos = Produto::all();

?>

<div class="card">
    <div class="card-header">

        <div class="row">
            <div class="col align-self-left pt-1">
                <h4>Listagem de Produtos</h4>
            </div>
            <div class="col align-self-right text-right">
                <a class="btn btn-primary" href="/produtos/cadastro"><i class="fa fa-plus-circle"></i> Novo Produto</a>
            </div>
        </div>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>-</th>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Estoque</th>
                    <th>marca</th>
                    <th>Modelo</th>
                    <th>Preço</th>
                    <th>Data Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?= $produto->getThumbnail() ?></td>
                        <td><?= $produto->id ?></td>
                        <td><?= $produto->nome ?></td>
                        <td><?= $produto->estoque?->quantidade ?? 0 ?></td>
                        <td><?= $produto->marca ?></td>
                        <td><?= $produto->modelo ?></td>
                        <td><?= $produto->getValorVendaFormatado() ?></td>
                        <td><?= $produto->getCreatedAtFormatado(true) ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="/produtos/editar/<?= $produto->id ?>"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm"href="/produtos/remover/<?= $produto->id ?>"><i class="fa fa-trash"></i></a>
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