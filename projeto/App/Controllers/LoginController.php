<?php

namespace App\Controllers;

use App\Models\Usuario;
use Exception;
use App\Services\DefaultServices;
use App\Services\RedirectServices;
use App\Controllers\Controller;

class LoginController extends Controller {

    public $validarLogin = false;

    public function index() {
        return require_once __DIR__ . '/../Views/login.php';
    }

    public function cadastro() {
        return require_once __DIR__ . '/../Views/cadastro.php';
    }

    public function login(){
        try{

            $_POST['email'] ??= null;
            $_POST['senha'] ??= null;

            if(!$_POST['email'] || !$_POST['senha']){
                throw new Exception("Obrigatório inserir email e senha");
            }

            $usuario = Usuario::where([
                ['email', '=', $_POST['email']],
                ['senha', '=', sha1(md5($_POST['senha']))]
            ])->first();

            if(!$usuario){
                throw new Exception("Credenciais incorretas");
            }

            $_SESSION['logado'] = true;
            $_SESSION['email']  = $usuario->email;
            $_SESSION['nome']   = $usuario->nome;
            $_SESSION['empresa_id']   = $usuario->empresa_id;
       
            return redirect('/home')->sucesso('Operação realizada com sucesso');
        }catch(Exception $e){
            echo($e->getMessage());
        }
    }
    
    public function novoUsuario(){
        try{

            $_POST['empresa_id'] ??= null;
            $_POST['nome']       ??= null;
            $_POST['email']      ??= null;
            $_POST['senha']      ??= null;
            $_POST['re_senha']   ??= null;

            $usuario = Usuario::where('email', $_POST['email'])->first();

            if($usuario){
                throw new Exception('Email já cadastrado');
            }

            if($_POST['senha'] != $_POST['re_senha']){
                throw new Exception('As senhas digitadas não correspondem');
            }

            $usuario = new Usuario();
            $usuario->empresa_id = $_POST['empresa_id'];
            $usuario->nome       = $_POST['nome'];
            $usuario->email      = $_POST['email'];
            $usuario->senha      = sha1(md5($_POST['senha']));
            $usuario->save();

            return redirect('/login')->sucesso('Operação realizada com sucesso');
        }catch(Exception $e){
            return redirect('/cadastro')->erro($e->getMessage());
        }
    }

    public function deslogar(){
        try{

            DefaultServices::deslogar();

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }


}