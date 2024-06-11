<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Produto; //injeção de dependencias

class ProdutoController extends Controller
{       
    private $produto

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
}
    //crias produto
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'categoria_id' => 'required|integer|exists:categoria_id',
        ]);
        $produto = $this->produto->create($validatedData);

        return redirect()->route('produto.index')->with('success', 'produto criado com sucesso!')
    }
{
    //Listar produtos
    public function index()
    {
        $produto = Produtos::all();
        return view('produtos.index' , ['produtos' => $produto]);
    }
    //Exibir produto
    public function show($id)
{
    $produto = Produto::find($id);
    if (!$produto) {
        abort(404);
    }
    return view('produto.show', ['produto' => $produto])
}
    //criar produto
    public function store(Request $request)
{
    $validateData = $request->validate([
        'nome' => 'required|string|max:255',
        'descricao' => 'required|string',
        'preco' => 'required|numeric|min:0',
        'categoria_id' => 'required|integer|exists:categorias,id',
    ])
        $produto = Produto::create($validateData);

        return redirect()->route('produto.index')->with('success','Produto criado com sucesso!');
}
    //Atualizar produto
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
            if (!$produto){
            abort(404)
        }
        $validateData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric\min:0',
            'categoria_id' => 'required|integer|exists:categorias,id',
        ]);

        $produto->update($validateData);

        return redirect()->route('produtos.index')->with('success','Produto atualizado com sucesso');
        
    }
    //excluir produtos
    public function destroy($id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            abort(404);
        }
        $produto->delete();
        return redirect()->route('produto.index')->with('success','Produto Excluido com sucesso');
    }
}


