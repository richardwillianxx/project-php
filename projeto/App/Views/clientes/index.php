<?php

use App\Models\Cliente;
use App\Widgets\BaseWidget;

$breadcumb = [
    [
        'title' => 'Clientes',
        'url'   => '/clientes',
    ]
];

BaseWidget::breadcumb('clientes', $breadcumb);

$clientes = Cliente::all();

?>

<div class="card">
    <div class="card-header">

        <div class="row">
            <div class="col align-self-left pt-1">
                <h4>Listagem de Clientes</h4>
            </div>
            <div class="col align-self-right text-right">
                <a class="btn btn-primary" href="/clientes/cadastro"><i class="fa fa-plus-circle"></i> Novo Cliente</a>
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
                    <th>email</th>
                    <th>telefone</th>
                    <th>endereco</th>
                    <th>rua</th>
                    <th>cep</th>
                    <th>bairro</th>
                    <th>pais</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $Cliente): ?>
                    <tr>
                        <td><?= $Cliente->id ?></td>
                        <td><?= $Cliente->nome ?></td>
                        <td><?= $Cliente->email ?></td>
                        <td><?= $Cliente->telefone ?></td>
                        <td><?= $Cliente->endereco ?></td>
                        <td><?= $Cliente->rua ?></td>
                        <td><?= $Cliente->cep ?></td>
                        <td><?= $Cliente->bairro ?></td>
                        <td><?= $Cliente->pais ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="/clientes/editar/<?= $Cliente->id ?>"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm"href="/clientes/remover/<?= $Cliente->id ?>"><i class="fa fa-trash"></i></a>
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