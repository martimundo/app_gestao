<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'cliente_id'
    ];

    public function cliente(){
        
        return $this->hasMany(Cliente::class);
    }
}
