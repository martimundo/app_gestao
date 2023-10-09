<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = "fornecedores";
    protected $fillable = [
        'nome',
        'cnpj',
        'email',
        'site',
        'telefone',
        'uf',
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
