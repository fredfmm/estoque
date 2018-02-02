@extends('layout.principal')
@section('conteudo')

  @if(empty($produtos))
    <div class="alert alert-danger">
      Você não tem nenhum produto cadastrado.
    </div>
  @else
  <h1>Listagem de Produtos </h1>
    <table class="table tale-striped">
    @foreach ($produtos as $p)
      <?php //foreach ($produtos as $p): ?>
      <tr class="{{$p->quantidade<=1 ? 'danger' : '' }}">
          <td> {{$p->nome}} </td>
          <td> {{$p->valor }}</td>
          <td> {{$p->descricao}} </td>
          <td> {{$p->quantidade}} </td>
          <td>
            <a href="{{action('ProdutoController@mostra', $p->id)}}">
              <span class="glyphicon glyphicon-search"></span>
            </a>
          </td>
          <td>
            <a href="{{action('ProdutoController@remove', $p->id)}}">
              <span class="glyphicon glyphicon-trash"></span>
            </a>
          </td>
          <td>
            <a href="{{action('ProdutoController@alterar', $p->id)}}">
              <span class="glyphicon glyphicon-trash"></span>
            </a>
          </td>
      </tr>
    @endforeach
    <?php //endforeach ?>
    </table>
  @endif
  <h4>
    <span class="label label-danger pull-right">
      Um ou menos itens no estoque
    </span>
  </h4>
 @if(old('nome'))
  <div class="alert alert-success">
    <strong>Sucesso!</strong > O produto {{ old('nome')}} foi adicionado com sucesso!
  </div>
  @endif
@stop
