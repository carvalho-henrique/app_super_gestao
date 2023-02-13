@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')  
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Cadastro enviado com sucesso!</h1>
        </div>

        <div class="informacao-pagina">
            <p>Suas informações estão cadastradas em nosso sistema.</p>
        </div>  
    </div>
    @include('site.layouts._partials.rodape')
@endsection

