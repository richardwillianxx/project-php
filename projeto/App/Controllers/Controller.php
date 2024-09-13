<?php

namespace App\Controllers;

use App\Services\DefaultServices;

class Controller {

    public $validarLogin = true;

    public function __construct(){

        if($this->validarLogin){
            DefaultServices::verificarLogin();
        }

    }

    public function render($view, $data = []){
        extract($data);
 
        require_once sprintf('%s/../Views%s', __DIR__, $view);
    }

}