<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Cliente;
use Exception;

class ClienteController extends Controller
{

    public function index()
    {
        return $this->render('/clientes/index.php');
    }

    public function formulario($cliente)
    {

        $cliente['cliente'] ??= null;

        $cliente = Cliente::find($cliente['cliente']);

        return $this->render('/clientes/formulario.php', [
            'titulo'  => $cliente?->id ? "Editar cliente" : "Cadastrar cliente",
            'cliente' => $cliente
        ]);
    }

    public function salvar($cliente)
    {

        $cliente['cliente'] ??= null;

        $cliente = Cliente::find($cliente['cliente']);

        if (!$cliente) {
            $cliente = new Cliente();
        }

       
        $cliente->nome           = $_POST['nome'] ?? null;
        $cliente->email          = $_POST['email'] ?? null;
        $cliente->telefone       = $_POST['telefone'] ?? null;
        $cliente->endereco       = $_POST['endereco'] ?? null;
        $cliente->rua            = $_POST['rua'] ?? null;
        $cliente->cep            = $_POST['cep'] ?? null;
        $cliente->bairro         = $_POST['bairro'] ?? null;
        $cliente->uf             = $_POST['uf'] ?? null;
        $cliente->pais           = $_POST['pais'] ?? null;
        $cliente->empresa_id     = 1;
        $cliente->save();

        return redirect('/clientes')->sucesso('Operação realizada com sucesso');
    }

    public function remover($cliente){
        try{

            $cliente['cliente'] ??= null;

            $cliente = Cliente::find($cliente['cliente']);

            if(!$cliente?->id){
                throw new Exception("Cliente não encontrado");
            }

            $cliente->delete();

            return redirect('/clientes')->sucesso('Operação realizada com sucesso');
        }catch(Exception $e){
            return redirect('/clientes')->erro($e->getMessage());
        }
    }
}

