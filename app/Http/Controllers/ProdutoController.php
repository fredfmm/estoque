<?php

namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {

  public function lista(){
    $produtos = DB::select('select * from produtos');
    return view('produto.listagem')->with('produtos', $produtos);
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
    $resposta = DB::select('select * from produtos where id = ?', [$id]);

    if(empty($resposta)){
      return "Esse produto não existe";
    }

    return view('produto.detalhes')->with('p', $resposta[0]);
  }

  public function novo(){
    return view('produto.formulario');
  }

  public function adiciona(){
    $nome = Request::input('nome');
    $descricao = Request::input('descricao');
    $valor = Request::input('valor');
    $quantidade = Request::input('quantidade');
    //pode utilizar
    //$all = Request::all();
    //only = Request::only('nome', 'valor', '...')

    // DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?,?,?,?)', array($nome, $quantidade, $valor, $descricao));
    //alternativa query builder
    DB::table('produtos')->insert(
      [
        'nome' => $nome,
        'valor' => $valor,
        'descricao' => $descricao,
        'quantidade' => $quantidade
      ]
    );

    return view('produto.adicionado')->with('nome', $nome);
  }

}
