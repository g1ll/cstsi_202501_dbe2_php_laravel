<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){
        $listProdutos = Produto::all();
        // dd($listProdutos); //helper laravel
        //helper laravel View::make();
        // return view('produtos.index',compact('listProdutos'));
        return view('produtos.index',['produtosList'=>$listProdutos]);
    }

    public function show($id){
        // dd($id);
        // dd(Produto::find($id));
        return view('produtos.show',[
            'produto'=>Produto::find($id)
        ]);
    }
}
