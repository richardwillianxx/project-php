<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $empresa_id
 * @property string $nome
 * @property float $valor_compra
 * @property float $valor_venda
 * @property string $marca
 * @property string $modelo
 * @property string $unidade_medida
 * @property string $descricao
 * @property string $thumbnail
 * 
 * @property-read empresa $empresa
 */

class Cliente extends Model
{
    protected $table = 'Clientes';

    protected $primaryKey = 'id';

    public $timestamps = true;

    
}