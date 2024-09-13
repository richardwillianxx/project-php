<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;

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
 * @property-read Empresa $empresa
 * @property-read Estoque $estoque
 */

class Produto extends Model
{
    protected $table = 'produtos';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function getValorVendaFormatado(){
        return sprintf('R$ %s', number_format($this->valor_venda, '2', ',', '.'));
    }

    public function getCreatedAtFormatado($horas = false){
        if($horas == false){
            return date('d/m/Y', strtotime($this->created_at));
        }

        return date('d/m/Y H:i:s', strtotime($this->created_at));
    }

    public function getThumbnail(){
        return sprintf('<img class="rounded mx-auto d-block" width="35" src="%s">', $this->thumbnail);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function estoque(){
        return $this->belongsTo(Estoque::class, 'id', 'produto_id');
    }
}
