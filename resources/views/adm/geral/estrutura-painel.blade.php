@extends('adm.geral.estrutura')

@section('menu')
<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{route('painel')}}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('adm/painel/usuario')}}">Usuários</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-informacao" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Informações
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown-informacao">
            <a class="dropdown-item" href="{{url('adm/painel/empresa')}}">Empresa</a>
            <a class="dropdown-item" href="{{url('adm/painel/endereco')}}">Endereços</a>
            <a class="dropdown-item" href="{{url('adm/painel/rede-social')}}">Redes Sociais</a>
            <a class="dropdown-item" href="{{url('adm/painel/telefone')}}">Telefones</a>
            <a class="dropdown-item" href="{{url('adm/painel/email')}}">E-mails</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-conteudo" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Conteúdo
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown-conteudo">
            <a class="dropdown-item" href="{{url('adm/painel/slide')}}">Slides</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('adm/painel/chamada-principal')}}">Chamada Principal</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('adm/painel/recurso-chamada')}}">Recurso/Chamada</a>
            <a class="dropdown-item" href="{{url('adm/painel/recurso-item')}}">Recurso/Itens</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('adm/painel/case-chamada')}}">Case/Chamada</a>
            <a class="dropdown-item" href="{{url('adm/painel/case-item')}}">Case/Itens</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('adm/painel/faq-chamada')}}">Faq/Chamada</a>
            <a class="dropdown-item" href="{{url('adm/painel/faq-item')}}">Faq/Itens</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('adm/painel/cliente-chamada')}}">Cliente/Chamada</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('adm/painel/sobre-nos')}}">Sobre nós</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-artigo" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Artigos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown-artigo">
            <a class="dropdown-item" href="{{url('adm/painel/artigo-categoria')}}">Categorias</a>
            <a class="dropdown-item" href="{{url('adm/painel/artigo')}}">Artigos</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-gestao" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Gestão
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown-gestao">
            <a class="dropdown-item" href="{{url('adm/painel/fale-conosco')}}">Contatos</a>
            <a class="dropdown-item" href="{{url('adm/painel/assinante')}}">Assinantes</a>
        </div>
    </li>

</ul>
<span class="navbar-text">
    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" style="color: white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> {{Auth::user()->name}}
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{route('sair')}}"><i class="fas fa-sign-out-alt"></i> Sair</a>
        </div>
    </div>
</span>

@endsection


@section('content')
<div class="container">
    <br><br>
    @yield('area-especifica')
</div>
@endsection