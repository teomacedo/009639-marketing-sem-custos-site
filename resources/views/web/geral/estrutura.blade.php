
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{{$tituloAba ?? $empresa->nome}}</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <link rel="shortcut icon" href="{{ URL::asset(''.$empresa->icon) }}" />

        <script src="{{ URL::asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>

        <script src="{{ URL::asset('js/adm.js') }}"></script>

        <link rel="stylesheet" type="text/css" href="{{ url('dist/estilo.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('dist/estilo-mobile.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('dist/estilo-desktop.css') }}">

        @yield('head')

    </head>

    <body>
        <div class="menu-desktop">
            <div class="container" style="height: 100%;">
                <div class="menu-desktop-geral">
                    <a href="{{route('home')}}"><img src="{{url(''.$empresa->imagem)}}"></a>
                    <div>
                        <a href="{{route('home')}}"><div class="menu-desktop-links-item menu-desktop-links-item-centro">Home</div></a>
                        <a href="{{url('/sobre-nos')}}"><div class="menu-desktop-links-item menu-desktop-links-item-centro">Sobre nós</div></a>
                        <a href="{{url('/fale-conosco')}}"><div class="menu-desktop-links-item menu-desktop-links-item-centro">Fale conosco</div></a>
                        <a href="{{route('blog')}}"><div class="menu-desktop-links-item menu-desktop-links-item-centro">Blog</div></a>
                    </div>
                    <div>
                        <a href="https://nucserver.com.br/painel"><div class="menu-desktop-links-item">Entrar</div></a>
                        <a href="https://nucserver.com.br/cadastro"><div class="menu-desktop-links-item menu-desktop-links-botao">Tenho interesse</div></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @if (count($errors) > 0)
            <div class="alerta alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                -{{ $error }}<br>
                @endforeach
            </div>
            @endif

            @if (session('mensagemSucesso'))
            <div class="alerta alert alert-success text-center">
                {!! session('mensagemSucesso') !!}
            </div>
            @endif

            @if (session('mensagemErro'))
            <div class="alerta alert alert-danger text-center">
                {!! session('mensagemErro') !!}
            </div>
            @endif
        </div>

        <style type="text/css">
            .aba-assinautra-area-margin-top{
                margin-top: 60px;
            }
        </style>
        @yield('capa')
        <div class="container">
            <div class="pagina-divisao-vertical">
                <div class="pagina-divisao-vertical-principal">
                    <div class="secao">
                        <div style="display: flex; flex-wrap: wrap;">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <div class="pagina-divisao-vertical-secundario">
                    <div style="display: flex; justify-content: flex-end;">
                        <div class="aba-assinautra-area-margin-top" style="width: 350px; position: absolute; z-index: 2;">
                            <div class="aba-assinautra-area">
                                <div class="aba-assinautra-area-titulo-pequeno">
                                    JUNTE-SE A NÓS!
                                </div>
                                <div class="aba-assinautra-area-titulo-grande">
                                    Informe seu e-mail abaixo para ser notificado sempre que tivermos novas publicações.
                                </div>

                                {!!Form::open(['url' => [url('/email-assinatura')]])!!}
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Qual seu melhor email?' ])!!}
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="nome" class="form-control" placeholder="Nome" aria-label="" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit" value='submit' id="button-addon2"><i class="fas fa-check"></i> Cadastrar</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>

                            <div class="aba-assinautra-area">
                                <div class="aba-assinautra-area-titulo-pequeno">
                                    CATEGORIAS
                                </div>
                                @foreach($categorias as $row)
                                @if(count($row->artigos)>0)
                                <a href="{{url('categoria'.'/'.$row->id)}}">
                                    <div class="categoria-botao">
                                        {!!$row->nome!!}
                                    </div>
                                </a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>           



        <div style="position: fixed; bottom: 5px; right: 5px; z-index: 3">
            <a href="https://api.whatsapp.com/send?1=pt_BR&phone=55{{$empresa->whatsapp}}">
                <div class="menu-desktop-links-botao">
                    <i class="fab fa-whatsapp"></i><span class="small-off"> Converse com a gente via </span>WhatsApp
                </div>
            </a>
        </div>


        <div class="rodape-divisao"></div>
        <div class="container">
            <div class="rodape-area">
                <div class="rodape-area-coluna">
                    <a href="{{route('home')}}"><img src="{{url(''.$empresa->imagem)}}" class="img-fluid"></a>
                </div>
                <div class="rodape-area-coluna">
                    <div class="rodape-area-coluna-titulo">
                        Telefones
                    </div>
                    <div class="rodape-area-coluna-itens">
                        @foreach($telefones as $row)
                        {!!$row->icon!!} {{$row->numero}}<br>
                        @endforeach
                    </div>
                </div>

                <div class="rodape-area-coluna">
                    <div class="rodape-area-coluna-titulo">
                        Onde estamos
                    </div>
                    <div class="rodape-area-coluna-itens">
                        @foreach($endereco as $row)
                        {{$row->cidade}}-{{$row->estado}}<br>
                        {{$row->bairro}}<br>
                        {{$row->endereco}}, {{$row->numero}}<br>
                        {{$row->cep}}<br><br>
                        @endforeach
                    </div>
                </div>
                <div class="rodape-area-coluna">
                    <div class="rodape-area-coluna-titulo">
                        E-mails
                    </div>
                    <div class="rodape-area-coluna-itens">
                        @foreach($emails as $row)
                        {{$row->email}}<br>
                        @endforeach

                    </div>

                    <div class="rodape-area-coluna-titulo">
                        Siga nas Redes Sociais
                    </div>
                    <div class="rodape-area-coluna-itens">
                        @foreach($redesSociais as $row)
                        <a href="{{$row->link}}">{!!$row->icon!!} {{$row->nome}}</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ url('js/nunTelefone.js') }}"></script>

    </body>

</html>






