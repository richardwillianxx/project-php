<?php

use App\Widgets\BaseWidget;

/**
 * @var Categoria $categoria
 */

$breadcumb = [
    [
        'title' => 'Categorias',
        'url'   => '/categorias',
    ],
    [
        'title' => 'Cadastro',
        'url'   => '/categorias/cadastro',
    ],
];

BaseWidget::breadcumb('Categorias', $breadcumb);

?>

<form method="post" action="<?= $categoria?->id ? '/categorias/salvar/'.$categoria?->id : '/categorias/salvar' ?>">
    <div class="card">
        <div class="card-header">
            <h4><?= $titulo ?></h4>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $categoria?->nome ?>" required>
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