<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConclusaoController extends Controller
{
    public function conclusao()
    {
        return view('site.conclusao_form_contato', ['titulo' => 'Conclusão']);
    }
}
