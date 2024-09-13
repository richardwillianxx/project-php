<?php

use App\Models\Cliente;
use App\Models\Produto;
use App\Widgets\BaseWidget;

/**
 * @var Produto[] $produtos
 * @var Cliente[] $clientes
 */

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
        <h3 class="card-title">Formulário de Compra</h3>
    </div>
    <div class="card-body">
        <form action="/compra/salvar" method="post">
            <div class="row">
                <!-- Seção de Clientes -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cliente">Cliente</label>
                        <select id="cliente" name="cliente_id" class="form-control">
                            <?php foreach ($clientes as $cliente): ?>
                                <option value="<?= $cliente->id ?>"><?= htmlspecialchars($cliente->nome) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- Seção de Produtos -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="produto">Produto</label>
                        <select id="produto" name="produto_id" class="form-control">
                            <?php foreach ($produtos as $produto): ?>
                                <option value="<?= $produto->id ?>"><?= htmlspecialchars($produto->nome) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Preço Unitário -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="preco_unitario">Preço Unitário</label>
                        <input type="text" id="preco_unitario" name="preco_unitario" class="form-control" required>
                    </div>
                </div>

                <!-- Quantidade -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" id="quantidade" name="quantidade" class="form-control" required>
                    </div>
                </div>
            </div>

            <!-- Botão de Envio -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar Compra</button>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <small>Preencha todos os campos e clique em 'Salvar Compra' para registrar a Compra.</small>
    </div>
</div>