<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Estoque;
use App\Models\Produto;
use Exception;
use Illuminate\Support\Facades\Auth;

class EstoqueController extends Controller
{

    public function index()
    {
        $estoques = Estoque::whereHas('produto', function($query){

            $query->where('empresa_id', user()->empresa_id);

        })->get();

        return $this->render('/estoque/index.php', [
            'estoques' => $estoques
        ]);
    }

    public function formulario($estoque)
    {

        $estoque['estoque'] ??= null;

        $estoque = Estoque::find($estoque['estoque']);

        $produtos = Produto::where([
            ['empresa_id', '=', user()->empresa_id]
        ])->doesntHave('estoque')->get();

        return $this->render('/estoque/formulario.php', [
            'titulo'  => $estoque?->id ? "Editar estoque" : "Cadastrar estoque",
            'estoque' => $estoque,
            'produtos' => $produtos,
        ]);
    }

    public function salvar($estoque)
    {

        $estoque['estoque'] ??= null;

        $estoque = Estoque::find($estoque['estoque']);

        if (!$estoque) {
            $estoque = new Estoque();
        }

        $estoque->produto_id = $_POST['produto_id'];
        $estoque->quantidade = $_POST['quantidade'];
        $estoque->save();

        return redirect('/estoque')->sucesso('Operação realizada com sucesso');
    }

    public function remover($estoque){
        try{

            $estoque['estoque'] ??= null;

            $estoque = Estoque::find($estoque['estoque']);

            if(!$estoque?->id){
                throw new Exception("estoque não encontrado");
            }

            $estoque->delete();

            return redirect('/estoque')->sucesso('Operação realizada com sucesso');
        }catch(Exception $e){
            return redirect('/estoque')->erro($e->getMessage());
        }
    }

  
}