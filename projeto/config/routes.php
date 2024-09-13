<?php

use App\Controllers\CategoriasController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\ProdutosController;
use App\Controllers\ClienteController;
use App\Controllers\EstoqueController;
use App\Controllers\VendaController;
use App\Controllers\CompraController;

use FastRoute\RouteCollector;

return function(RouteCollector $r) {
    $r->addRoute('GET', '/', [HomeController::class, 'index']);
    $r->addRoute('GET', '/home', [HomeController::class, 'index']);

    $r->addRoute('GET', '/login', [LoginController::class, 'index']);
    $r->addRoute('POST', '/iniciarsessao', [LoginController::class, 'login']);
    $r->addRoute('POST', '/deslogar', [LoginController::class, 'deslogar']);
    
    $r->addRoute('GET', '/cadastro', [LoginController::class, 'cadastro']);
    $r->addRoute('POST', '/novousuario', [LoginController::class, 'novoUsuario']);

    $r->addRoute('GET', '/produtos', [ProdutosController::class, 'index']);
    $r->addRoute('GET', '/produtos/cadastro', [ProdutosController::class, 'formulario']);
    $r->addRoute('GET', '/produtos/editar/{produto}', [ProdutosController::class, 'formulario']);
    $r->addRoute('POST', '/produtos/salvar[/{produto}]', [ProdutosController::class, 'salvar']);
    $r->addRoute('GET', '/produtos/remover/{produto}', [ProdutosController::class, 'remover']);

    $r->addRoute('GET', '/categorias', [CategoriasController::class, 'index']);
    $r->addRoute('GET', '/categorias/cadastro', [CategoriasController::class, 'formulario']);
    $r->addRoute('GET', '/categorias/editar/{categoria}', [CategoriasController::class, 'formulario']);
    $r->addRoute('POST', '/categorias/salvar[/{categoria}]', [CategoriasController::class, 'salvar']);
    $r->addRoute('GET', '/categorias/remover/{categoria}', [CategoriasController::class, 'remover']);

    $r->addRoute('GET', '/clientes', [ClienteController::class, 'index']);
    $r->addRoute('GET', '/clientes/cadastro', [ClienteController::class, 'formulario']);
    $r->addRoute('GET', '/clientes/editar/{cliente}', [ClienteController::class, 'formulario']);
    $r->addRoute('POST', '/clientes/salvar[/{cliente}]', [ClienteController::class, 'salvar']);
    $r->addRoute('GET', '/clientes/remover/{cliente}', [ClienteController::class, 'remover']);

    $r->addRoute('GET', '/estoque', [EstoqueController::class, 'index']);
    $r->addRoute('GET', '/estoque/cadastro', [EstoqueController::class, 'formulario']);
    $r->addRoute('GET', '/estoque/editar/{id}', [EstoqueController::class, 'formulario']);
    $r->addRoute('POST', '/estoque/salvar[/{id}]', [EstoqueController::class, 'salvar']);
    $r->addRoute('GET', '/estoque/remover/{id}', [EstoqueController::class, 'remover']);

    $r->addRoute('GET', '/venda', [VendaController::class, 'index']);
    $r->addRoute('GET', '/venda/cadastro', [VendaController::class, 'formulario']);
    $r->addRoute('GET', '/venda/editar/{id}', [VendaController::class, 'formulario']);
    $r->addRoute('POST', '/venda/salvar[/{id}]', [VendaController::class, 'salvar']);
    $r->addRoute('GET', '/venda/remover/{id}', [VendaController::class, 'remover']);

    $r->addRoute('GET', '/compra', [CompraController::class, 'index']);
    $r->addRoute('GET', '/compra/cadastro', [CompraController::class, 'formulario']);
    $r->addRoute('GET', '/compra/editar/{id}', [CompraController::class, 'formulario']);
    $r->addRoute('POST', '/compra/salvar[/{id}]', [CompraController::class, 'salvar']);
    $r->addRoute('GET', '/compra/remover/{id}', [CompraController::class, 'remover']);
    
    // Adicione mais rotas aqui
};