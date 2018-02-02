<?php

namespace estoque\Http\Controllers;

use estoque\Produto;
use Illuminate\Support\Facades\DB;
use Request;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller {

  public function lista(){
    // $produtos = DB::select('select * from produtos');
    $produtos = Produto::all();
    return view('produtos.listagem')->with('produtos', $produtos);
    //teste magic method
    // return view('listagem')->withProdutos(produtos);

    //tambem poderia executar o
    //return view('listagem', ['produtos' => $produtos]);

    //tbm é possivel verifica se a view existe
    // if (view()->exists('listagem'))
    // {
    //   return view('listagem');
    // }
  }

  public function mostra($id){
    // $id = Request::input('id');
    // $id = Request::input( 'id', '0');
    // quando passamos url amigaveis mudamos para
    // $id = Request::route('id');
    // o laravel já reconhece o parametro automaticamente
    // $resposta = DB::select('select * from produtos where id = ?', [$id]);
    //
    // if(empty($resposta)){
    //   return "Esse produtos não existe";
    // }
    //
    // return view('produtos.detalhes')->with('p', $resposta[0]);

    //exemplo com o eloquent
    $produto = Produto::find($id);
    if(empty($produto)){
      return "Esse produto não existe.";
    }
    return view('produtos.detalhes')->with('p', $produto);
  }

  public function novo(){
    return view('produtos.formulario');
  }

  public function adiciona(ProdutosRequest $request){

    //as validacoes foram feitas em Request/ProdutosRequest.php
    // $validator = Validator::make(
    //   ['nome' => Reqest::input('nome')],
    //   ['nome' => 'required|min:5']
    // );
    //
    // if ($validator->fails()){
    //   return redirect()->action('PordutoController@novo');
    // }



    // $nome = Request::input('nome');
    // $descricao = Request::input('descricao');
    // $valor = Request::input('valor');
    // $quantidade = Request::input('quantidade');
    //pode utilizar
    //$all = Request::all();
    //only = Request::only('nome', 'valor', '...')

    // DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?,?,?,?)', array($nome, $quantidade, $valor, $descricao));
    //alternativa query builder
    // DB::table('produtos')->insert(
    //   [
    //     'nome' => $nome,
    //     'valor' => $valor,
    //     'descricao' => $descricao,
    //     'quantidade' => $quantidade
    //   ]
    // );

    // return view('produto.adicionado')->with('nome', $nome);

    // $produtos = DB::select('select * from produtos);
    // return view('produto.listagem')->with('produtos', $produtos);

    // return redirect('/produtos')->withInput;
    // return redirect('/produtos')->withInput(Request::except('nome'));
    // return redirect()->action('ProdutoCOntroller@lista')->withInput(Request::only('nome'));
    // return redirect('/produtos')->withInput(Request::only('nome'));


    //exemplo com eloquent
    // $produto = new Produto();
    // $produto->nome = Request::input('nome');
    // $produto->valor = Request::input('valor');
    // $produto->descricao = Request::input('descricao');
    // $produto->quantidade = Request::input('quantidade');
    // $produto->save;

    //ou ainda mais simples

    // $params = Request::all();
    // $produto = new Produto($params);
    // $produto->save;

    //outra opcao
    Produto::create($request->all());
      return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));

  }

  public function listaJson() {
    $produtos = DB::select('select * from produtos');
    return response()->json($produtos);
  }

  public function remove($id){
    $produto = Produto::find($id);
    $produto->delete();
    return redirect()->action('ProdutoController@lista');
  }

  public function alterar($id){
    $produto = Produto::find($id);
    if(empty($produto)){
      return "Esse produto não existe.";
    }
    return view('produtos.alterar')->with('p', $produto);
  }

  public function alteracao(){
    Produto::where('id', Request::input('id'))->update(['nome' => Request::input('nome')]);
    return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
  }


}
