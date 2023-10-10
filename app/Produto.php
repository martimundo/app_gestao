<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'preco_custo',
        'preco_venda',
        'estoque_minimo',
        'estoque_maximo',
        'unidade_id',
        'fornecedor_id'
    ];

    public function produtoDetalhe(){

        return $this->hasOne('App\ProdutoDetalhe');
    }

    public function fornecedor(){

        return $this->belongsTo('App\Fornecedor');
    }
}
