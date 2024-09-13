<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nome
 * @property int $empresa_id
 * 
 * @property-read Empresa $empresa;
 */

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $primaryKey = 'id';
    
    public $timestamps = true;

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}