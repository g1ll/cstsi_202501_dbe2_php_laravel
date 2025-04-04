<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){
        $listProdutos = Produto::all();
        // dd($listProdutos);
        return view('produtos.index',compact('listProdutos'));
    }

    public function show($id){
        // dd($id);
        dd(Produto::find($id));
    }
}
