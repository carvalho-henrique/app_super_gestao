@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')  
    <div class="conteudo-pagina">
        <div class="titulo-pagina-app">
            <p>Adicionar Detalhes Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="#">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ $msg ?? ''}}
            <div style="width: 30%; margin-left: auto; margin-right:auto;">
                @component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades ])
                @endcomponent
            </div>
        </div>  
    </div>
    @include('site.layouts._partials.rodape')
@endsection