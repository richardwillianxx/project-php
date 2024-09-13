<?php

use Illuminate\Database\Capsule\Manager as Capsule;

require 'vendor/autoload.php';

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'erp',
    'username'  => 'root', // Coloque seu usuário do MySQL
    'password'  => '',     // Coloque sua senha do MySQL
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();