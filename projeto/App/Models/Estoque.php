<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property-read Produto $produto
 */
class Estoque extends Model
{    
    protected $table = 'estoque';

    protected $primaryKey = 'id';
    
    public $timestamps = true;

    protected $fillable = [
        'quantidade'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }
}