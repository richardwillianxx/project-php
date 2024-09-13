<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Produto;
use Exception;

class ProdutosController extends Controller
{

    public function index()
    {
        return $this->render('/produtos/index.php');
    }

    public function formulario($produto)
    {

        $produto['produto'] ??= null;

        $produto = Produto::find($produto['produto']);

        return $this->render('/produtos/formulario.php', [
            'titulo'  => $produto?->id ? "Editar Produto" : "Cadastrar Produto",
            'produto' => $produto
        ]);
    }

    public function salvar($produto)
    {

        $produto['produto'] ??= null;

        $produto = Produto::find($produto['produto']);

        if (!$produto) {
            $produto = new Produto();
        }

        $produto->empresa_id    = 1;
        $produto->nome          = $_POST['nome'] ?? null;
        $produto->valor_compra  = $_POST['valor_compra'] ?? null;
        $produto->valor_venda   = $_POST['valor_venda'] ?? null;
        $produto->marca         = $_POST['marca'] ?? null;
        $produto->modelo         = $_POST['modelo'] ?? null;
        $produto->unidade_medida = $_POST['unidade_medida'] ?? null;
        $produto->descricao      = $_POST['descricao'] ?? null;
        $produto->thumbnail      = $_POST['thumbnail'] ?? null;
        $produto->save();

        return redirect('/produtos')->sucesso('Operação realizada com sucesso');
    }

    public function remover($produto){
        try{

            $produto['produto'] ??= null;

            $produto = Produto::find($produto['produto']);

            if(!$produto?->id){
                throw new Exception("Produto não encontrado");
            }

            $produto->delete();

            return redirect('/produtos')->sucesso('Operação realizada com sucesso');
        }catch(Exception $e){
            return redirect('/produtos')->erro($e->getMessage());
        }
    }
}
