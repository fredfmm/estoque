@extends('layout.principal')
@section('conteudo')
<h1>Alterar produto </h1>

<form action="/produtos/alteracao" method="post">
  <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
  <input type="hidden" name="id" value="{{$p->id}}">
  <div calss="form-group">
    <label>Nome</label>
    <input name="nome" value="{{$p->nome}}" class="form-control"/>
  </div>
  <div calss="form-group">
    <label>Descrição</label>
    <input name="descricao" value="{{$p->descricao}}" class="form-control"/>
  </div>
  <div calss="form-group">
    <label>Valor</label>
    <input name="valor" value="{{$p->valor}}" class="form-control"/>
  </div>
  <div calss="form-group">
    <label>Quantidade</label>
    <input name="quantidade" value="{{$p->quantidade}}" class="form-control" type="number"/>
  </div>
  <div calss="form-group">
    <button type="submit" class="btn btn-primary btn-block">Alterar</button>
  </div>
</form>

@stop
