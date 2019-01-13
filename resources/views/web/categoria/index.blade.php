@extends('web.geral.estrutura')

@section('head')
<meta name="description" content="{{$categoria->meta_description)}}">

<!-- Compartilhamento Facebook e outras redes sociais sem protocolo definico -->
<meta property="og:type" content="website">
<meta property="og:description" content="{{$categoria->meta_description)}}">
<meta property="og:image" content="{{URL::asset(''.$categoria->imagem)}}">

<!-- Compartilhamento Twitter -->
<meta property="twitter:description" content="{{$categoria->meta_description)}}">
<meta property="twitter:image" content="{{URL::asset(''.$categoria->imagem)}}">



@endsection

@section('capa')
@include('web.geral.capa-categoria')
@endsection

@section('content')
<section>
    <div class="secao">
        <div class="secao-involucro">
            @foreach($artigos as $row)
            @include('web.geral.miniatura-artigo-area')
            @endforeach
        </div>
    </div>
</section>
@endsection
