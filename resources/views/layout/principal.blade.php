<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <link
          href="{{asset('css/app.css')}}"
          rel="stylesheet"
          type="text/css"
      >
      <link
            href="{{asset('css/custom.css')}}"
            rel="stylesheet"
            type="text/css"
        >
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <title>Controle de estoque</title>
  </head>
    <body>
      <div class="container">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="/produtos">
                Estoque laravel
              </a>
            </div>
            <ul class="nav navbar-nav navbar right">
              <li><a href="{{action('ProdutoController@lista')}}">Listagem</a></li>
              <li><a href="{{action('ProdutoController@novo')}}">Novo</a></li>
              <li><a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
            </ul>
          </div>
        </nav>

        @yield('conteudo')

        <footer class="footer">
          <p>Exemplo estoque Laravel</p>
        </footer>
      </div>
    </body>
</html>
