@extends('adm.geral.estrutura')

@section('menu')
<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{route('painel')}}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('adm/painel/usuario')}}">Usuários</a>
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