<?php

namespace App\Controllers;

use App\Models\Categoria;
use Exception;

class CategoriasController extends Controller
{
    public function index(){

        $categorias = Categoria::all();

        return $this->render('/categorias/index.php', [
            'categorias' => $categorias
        ]);
    }

    
    public function formulario($categoria)
    {

        $categoria['categoria'] ??= null;

        $categoria = Categoria::find($categoria['categoria']);

        return $this->render('/categorias/formulario.php', [
            'titulo'  => $categoria?->id ? "Editar Categoria" : "Cadastrar Categoria",
            'categoria' => $categoria
        ]);
    }

    public function salvar($categoria)
    {

        $categoria['categoria'] ??= null;

        $categoria = Categoria::find($categoria['categoria']);

        if (!$categoria) {
            $categoria = new categoria();
        }

        $categoria->empresa_id    = 1;
        $categoria->nome          = $_POST['nome'] ?? null;
        $categoria->save();

        return redirect('/categorias')->sucesso('Operação realizada com sucesso');
    }

    public function remover($categoria){
        try{

            $categoria['categoria'] ??= null;

            $categoria = Categoria::find($categoria['categoria']);

            if(!$categoria?->id){
                throw new Exception("Categoria não encontrada");
            }

            $categoria->delete();

            return redirect('/categorias')->sucesso('Operação realizada com sucesso');
        }catch(Exception $e){
            return redirect('/categorias')->erro($e->getMessage());
        }
    }
}