<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }
    
    public function salvar(Request $request){
        //Modo convencional
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');

        // $contato->save();

        //Modos com fillable no model
        // $contato = new SiteContato();
        // $contato->fill($request->all()); ou $contato->create($request->all());
        // $contato->save();

        $regras = [
            "nome" => 'required|min:3|max:40' ,
            "telefone" => 'required' ,
            "email" => 'email' ,
            "motivo_contatos_id" => 'required' ,
            "mensagem" => 'required'
            ];

        $feedback = [
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'email.email' => 'O campo email está invalido',
            'required' => 'O campo :attribute precisa ser preenchido'
        ]; 

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.conclusao');

    }

}
