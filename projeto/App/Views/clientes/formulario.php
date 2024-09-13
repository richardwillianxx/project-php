<?php

use App\Models\Cliente;
use App\Widgets\BaseWidget;

/**
 * @var Cliente $cliente
 */

$breadcumb = [
    [
        'title' => 'Cliente',
        'url'   => '/clientes',
    ]
];

BaseWidget::breadcumb('Cliente', $breadcumb);

?>

<form method="post" action="<?= $cliente?->id ? '/clientes/salvar/'.$cliente?->id : '/clientes/salvar' ?>">
    <div class="card">
        <div class="card-header">
            <h4><?= $titulo ?></h4>
        </div>
        <div class="card-body">

            <div class="row">
                <!-- Campos existentes -->

                <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $cliente?->nome ?>" required>
                </div>
                <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $cliente?->email ?>" required>
                </div>
                <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" id="telefone" name="telefone" value="<?= $cliente?->telefone ?>" required>
                </div>
                <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $cliente?->endereco ?>" required>
                </div>
                <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                    <label for="rua" class="form-label">Rua</label>
                    <input type="text" class="form-control" id="rua" name="rua" value="<?= $cliente?->rua ?>" required>
                </div>
                <div class="mb-3 col-sm-12 col-md-4 col-lg-4">
                    <label for="cep" class="form-label">CEP</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="cep" name="cep" value="<?= $cliente?->cep ?>" required>
                        <button type="button" class="btn btn-outline-secondary" id="buscarCep">Buscar</button>
                    </div>
                </div>
                <div class="mb-3 col-sm-12 col-md-4 col-lg-4">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="<?= $cliente?->bairro ?>" required>
                </div>
                <div class="mb-3 col-sm-12 col-md-4 col-lg-4">
                    <label for="uf" class="form-label">UF</label>
                    <input type="text" class="form-control" id="uf" name="uf" value="<?= $cliente?->uf ?>" required>
                </div>
                <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                    <label for="pais" class="form-label">País</label>
                    <input type="text" class="form-control" id="pais" name="pais" value="<?= $cliente?->pais ?>" required>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(function () {

    // Função para buscar o endereço pelo CEP
    $('#buscarCep').click(function() {
        var cep = $('#cep').val().replace(/\D/g, ''); // Remove caracteres não numéricos
        if (cep.length === 8) { // Verifica se o CEP tem 8 dígitos
            $.ajax({
                url: 'https://viacep.com.br/ws/' + cep + '/json/',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (!data.erro) {
                        $('#endereco').val(data.logradouro);
                        $('#bairro').val(data.bairro);
                        $('#uf').val(data.uf);
                        $('#pais').val('Brasil'); // País fixo para Brasil
                        $('#rua').val(data.logradouro); // Atualiza rua com o mesmo valor do logradouro
                    } else {
                        alert('CEP não encontrado.');
                    }
                },
                error: function() {
                    alert('Erro ao buscar o CEP.');
                }
            });
        } else {
            alert('CEP inválido.');
        }
    });

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });

  });
</script>