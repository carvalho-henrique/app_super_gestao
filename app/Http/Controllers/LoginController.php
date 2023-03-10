<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuário ou senha não existe';
        } else if ($request->get('erro') == 2){
            $erro = 'Necessário realizar login para ter acesso a página';
        }

        return view('site.login', ['titulo' => 'login', 'erro' => $erro]);
    }

    public function Autenticar(Request $request){
        $regras = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        $feedback = [
            'usuario.email' => 'O campo usúario (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório',
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            echo redirect()->route('site.login', ['erro' => 1]);

        }

    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
        
    }
}
