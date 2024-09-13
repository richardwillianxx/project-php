<?php

namespace App\Controllers;

use App\Models\Cliente;
use App\Models\Estoque;
use App\Models\Produto;
use App\Models\Compra;
use Exception;

class CompraController extends Controller
{

    public function index(){

        $compras = Compra::where([
            ['empresa_id', '=', user()->empresa_id]
        ])->get();

        return $this->render('/compras/index.php',[
            'compras' => $compras
        ]);
    }

    public function formulario($id){
        
        $clientes = Cliente::where([
            ['empresa_id', '=', user()->empresa_id]
        ])->get();
        
        $produtos = Produto::where([
            ['empresa_id', '=', user()->empresa_id]
        ])->get();

        return $this->render('/compras/formulario.php', [
            'clientes' => $clientes,
            'produtos' => $produtos,
        ]);
    }

    public function salvar($id){
        try{
            $id['id'] ??= null;

            $compra = Compra::find($id['id']);

            if (!$compra) {
                $compra = new Venda();
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

            $compra->empresa_id = user()->empresa_id;
            $compra->cliente_id = $_POST['cliente_id'];
            $compra->produto_id = $_POST['produto_id'];
            $compra->quantidade = $_POST['quantidade'];
            $compra->valor_unitario = $_POST['preco_unitario'];
            $compra->total = $compra->quantidade * $compra->valor_unitario;

            $compra->save();

            $estoque->quantidade -= $compra->quantidade;
            $estoque->save();

        
            return redirect("/compra")->sucesso("Operação realizada com sucesso");
        }catch(Exception $e){
            return redirect("/compra/cadastro")->erro($e->getMessage());
        }
    }

    public function remover($id){
        try{
            //logica de remoção
            return redirect("/compra")->sucesso("Operação realizada com sucesso");
        }catch(Exception $e){
            return redirect("/compra")->erro($e->getMessage());
        }
    }

}