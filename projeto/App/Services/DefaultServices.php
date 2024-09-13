<?php
namespace App\Services;

use Exception;

class DefaultServices {


    public bool $logado;
    public String $email;
    public String $nome;
    public int $empresa_id;

    public function __construct()
    {
        $this->logado       = $_SESSION['logado'];
        $this->email        = $_SESSION['email'];
        $this->nome         = $_SESSION['nome'];
        $this->empresa_id   = $_SESSION['empresa_id'];
    }

    static function deslogar()
    {
        try{
            
            $_SESSION['logado'] = false;
            $_SESSION['email']  = null;
            $_SESSION['nome']   = null;
            $_SESSION['empresa_id']   = null;

            session_destroy();
            
            header('Location: /login');
            exit();
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    static function verificarLogin(){
        try{

            if($_SESSION['logado'] == false){
                header('Location: /login');
                exit();
            }

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }


}