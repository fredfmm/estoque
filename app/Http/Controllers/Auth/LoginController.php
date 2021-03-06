<?php

namespace estoque\Http\Controllers\Auth;

use estoque\User;
use estoque\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Request;
use estoque\Http\Requests\UserRequest;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(UserRequest $request)
    {
    
       $credenciais = Request::only('email', 'password');
      return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));

      // if(Auth::attempt($credenciais)) {
      //   return "Usuário ". Auth::user()->name ." logado com sucesso";
      // }
      //
      // return "As credencias não são válidas";
    }
}
