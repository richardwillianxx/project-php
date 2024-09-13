<?php

use App\Models\Produto;
use App\Widgets\BaseWidget;

/**
 * @var Produto $produto
 */

$breadcumb = [
    [
        'title' => 'Produtos',
        'url'   => '/produtos',
    ]
];

BaseWidget::breadcumb('Produtos', $breadcumb);

?>

<form method="post" action="<?= $produto?->id ? '/produtos/salvar/'.$produto?->id : '/produtos/salvar' ?>">
    <div class="card">
        <div class="card-header">
            <h4><?= $titulo ?></h4>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $produto?->nome ?>" required>
                </div>
                <div class="mb-3 col-sm-12 col-md-3 col-lg-3">
                    <label for="valor_compra" class="form-label">Valor de Compra</label>
                    <input type="number" step="0.01" class="form-control" id="valor_compra" name="valor_compra" value="<?= $produto?->valor_compra ?>" required>
                </div>
                <div class="mb-3 col-sm-12 col-md-3 col-lg-3">
                    <label for="valor_venda" class="form-label">Valor de Venda</label>
                    <input type="number" step="0.01" class="form-control" id="valor_venda" name="valor_venda" value="<?= $produto?->valor_venda ?>" required>
                </div>
                <div class="mb-3 col-sm-12 col-md-4 col-lg-4">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" value="<?= $produto?->marca ?>">
                </div>
                <div class="mb-3 col-sm-12 col-md-4 col-lg-4">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" value="<?= $produto?->modelo ?>">
                </div>
                <div class="mb-3 col-sm-12 col-md-2 col-lg-2">
                    <label for="unidade_medida" class="form-label">Unidade de Medida</label>
                    
                    <select id="unidade_medida" class="form-control" name="unidade_medida">
                        <option value="UN">Unitário</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Thumbnail (URL)</label>
                    <input type="url" class="form-control" id="thumbnail" name="thumbnail" value="<?= $produto?->thumbnail ?>">
                </div>
                <div class="mb-3 col-12">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="summernote" name="descricao" rows="4"><?= $produto?->descricao ?></textarea>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>

<script>
  $(function () {

    $('#summernote').summernote();

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>