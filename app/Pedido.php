<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'cliente_id'
    ];

    public function cliente(){
        
        return $this->belongsTo(Cliente::class);
    }

    public function pedidos(){
        return $this->belongsToMany(Produto::class, 'pedidos_produtos', 'pedido_id','produto_id') ;
    }
}
