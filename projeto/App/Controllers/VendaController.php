<?php

namespace App\Controllers;

use App\Models\Cliente;
use App\Models\Estoque;
use App\Models\Produto;
use App\Models\Venda;
use Exception;

class VendaController extends Controller
{

    public function index(){

        $vendas = Venda::where([
            ['empresa_id', '=', user()->empresa_id]
        ])->get();

        return $this->render('/vendas/index.php',[
            'vendas' => $vendas
        ]);
    }

    public function formulario($id){
        
        $clientes = Cliente::where([
            ['empresa_id', '=', user()->empresa_id]
        ])->get();
        
        $produtos = Produto::where([
            ['empresa_id', '=', user()->empresa_id]
        ])->get();

        return $this->render('/vendas/formulario.php', [
            'clientes' => $clientes,
            'produtos' => $produtos,
        ]);
    }

    public function salvar($id){
        try{
            $id['id'] ??= null;

            $venda = Venda::find($id['id']);

            if (!$venda) {
                $venda = new Venda();
            }

            $estoque = Estoque::where([
                ['produto_id', '=', $_POST['produto_id']],
            ])->first();

            if(!$estoque){
                throw new Exception('Produto não tem estoque cadastrado');
            }

            if($estoque->quantidade <= $_POST['quantidade']){
                throw new Exception(
                    sprintf('%s tem apenas %s em estoque', $estoque->produto->nome, $estoque->quantidade)
                );
            }

            $venda->empresa_id = user()->empresa_id;
            $venda->cliente_id = $_POST['cliente_id'];
            $venda->produto_id = $_POST['produto_id'];
            $venda->quantidade = $_POST['quantidade'];
            $venda->valor_unitario = $_POST['preco_unitario'];
            $venda->total = $venda->quantidade * $venda->valor_unitario;

            $venda->save();

            $estoque->quantidade -= $venda->quantidade;
            $estoque->save();

        
            return redirect("/venda")->sucesso("Operação realizada com sucesso");
        }catch(Exception $e){
            return redirect("/venda/cadastro")->erro($e->getMessage());
        }
    }

    public function remover($id){
        try{
            //logica de remoção
            return redirect("/venda")->sucesso("Operação realizada com sucesso");
        }catch(Exception $e){
            return redirect("/venda")->erro($e->getMessage());
        }
    }

}