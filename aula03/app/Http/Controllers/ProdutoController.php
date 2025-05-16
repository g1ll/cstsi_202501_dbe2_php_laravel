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

    public function store(Request $request){
        $newProduto = $request->all();
        $newProduto['importado'] = $request->has('importado');

        // dd($newProduto);

        if(Produto::create($newProduto))
            return redirect('/produtos');
        else dd("Erro ao inserir produto!!");

    }

    public function create() {
        return view('produtos.create');
    }

    public function update(Request $request,$id){
        dd($request->all());
        $newProduto = $request->all();
        $newProduto['importado'] = $request->has('importado');

        // dd(["Atualizar Produto", $newProduto]);


        if(Produto::findOrFail($id)->update($newProduto))
            return redirect('/produtos');
        else dd("Erro ao atualizar produto!!");

    }

    public function edit($id) {
        $produto = Produto::find($id);
        return view('produtos.edit',compact('produto'));
    }

   public function delete($id) {
        if(Produto::destroy($id))
             return redirect('/produtos');
        else dd("Erro ao remover produto!!");
   }
}
