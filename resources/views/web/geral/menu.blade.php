<div class="menu-desktop small-off">
    <div class="container" style="height: 100%;">
        <div class="menu-desktop-geral">
            <a href="{{route('home')}}"><img src="{{url(''.$empresa->imagem)}}" alt="{{$empresa->nome}}" title="{{$empresa->nome}}"></a>
            <nav>
                <ul>
                    <li>
                        <a href="{{route('home')}}"><div class="menu-desktop-links-item menu-desktop-links-item-centro">Home</div></a>
                    </li>
                    <li>
                        <a href="{{url('/sobre-nos')}}"><div class="menu-desktop-links-item menu-desktop-links-item-centro">Sobre nós</div></a>
                    </li>
                    <li>
                        <a href="{{url('/fale-conosco')}}"><div class="menu-desktop-links-item menu-desktop-links-item-centro">Fale conosco</div></a>
                    </li>
                    <li>
                        <a href="{{route('blog')}}"><div class="menu-desktop-links-item menu-desktop-links-item-centro">Blog</div></a>
                    </li>
                </ul>
            </nav>
            <div>
                <a href="https://sys.nuctecnologia.com.br/painel"><div class="menu-desktop-links-item">Entrar</div></a>
                <a href="https://sys.nuctecnologia.com.br/cadastro"><div class="menu-desktop-links-item menu-desktop-links-botao">Tenho interesse</div></a>
            </div>
        </div>
    </div>
</div>
<div class="desktop-off" style="position: fixed; z-index: 3; width: 100%;">
    <div class="menu-small-topo">
        <div class="container">
            <div class="menu-small-topo-area-geral">
                <div class="menu-small-topo-area-logo">
                    <div class="menu-small-topo-area-logo-imagem" style="background-image: url('{{url(''. $empresa->imagem)}}')"></div>
                </div>
                <div class="menu-small-topo-area-botao">
                    <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse" id="collapseExample">
        <a href="{{route('home')}}" class="menu-small-itens">
            <div class="container">
                HOME
            </div>
        </a>
        <a href="{{url('/sobre-nos')}}" target="_blank" class="menu-small-itens">
            <div class="container">
                SOBRE NÓS
            </div>
        </a>
        <a href="{{url('/fale-conosco')}}" class="menu-small-itens">
            <div class="container">
                FALE CONOSCO
            </div>
        </a>
        <a href="{{route('blog')}}" class="menu-small-itens">
            <div class="container">
                BLOG
            </div>
        </a>
        <a href="https://sys.nuctecnologia.com.br/painel" class="menu-small-itens menu-small-itens-secundarios">
            <div class="container">
                ENTRAR
            </div>
        </a>
        <a href="https://sys.nuctecnologia.com.br/cadastro" class="menu-small-itens menu-small-itens-secundarios">
            <div class="container">
                TENHO INTERESSE
            </div>
        </a>
        <div class="menu-small-rede-social-area-fundo">
            <div class="container menu-small-rede-social-area">
                @foreach($redesSociais as $row)
                <a href="{{$row->link}}" target="_blank">
                    <div class="menu-small-rede-social">
                        {!!$row->icon!!}
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="desktop-off" style="height: 60px; width: 100%"></div>