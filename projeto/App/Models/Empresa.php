<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{    
    protected $table = 'empresas';

    protected $primaryKey = 'id';
    
    public $timestamps = true;
}