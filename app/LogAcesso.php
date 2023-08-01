<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogAcesso extends Model
{
    /**
     * Usando essa forma de criação do atributo, podemos criar registros em massa.
     */
    protected $fillable = ['log'];
}
