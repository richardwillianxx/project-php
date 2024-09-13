<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{    
    protected $table = 'vendas';

    protected $primaryKey = 'id';
    
    public $timestamps = true;

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function produto(){
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    public function getTotalFormatado(){
        return sprintf('R$ %s', number_format($this->total, 2, ',', '.'));
    }
}