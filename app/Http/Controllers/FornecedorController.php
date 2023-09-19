<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores=Fornecedor::all();
        return view('app.fornecedor', compact('fornecedores'));
    }
}
