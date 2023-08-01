<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index(){

        $motivo_contato = MotivoContato::all();
        return view('site.principal', ['motivo_contatos'=>$motivo_contato]);
    }
}
