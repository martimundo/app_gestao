<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2)
    {

        //echo "A soma dos valores de $p1 + $p2 é: ".($p1+$p2);
        //return view('site.teste', ['x' => $p1, 'y' => $p2, 'r' => $p1 + $p2]);...enviando os dados para view como array associativo
        $r = $p1 + $p2;
        //return view('site.teste', compact('p1', 'p2', 'r'));

        //com o metodo with
        return view('site.teste')->with('p1', $p1)->with('p2', $p2)->with('r', $r);
    }
}
