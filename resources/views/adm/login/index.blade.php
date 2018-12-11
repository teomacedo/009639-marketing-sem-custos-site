@extends('adm.geral.estrutura')
@section('content')

<div class="text-center" style="width: 400px; margin: 0 auto; margin-top: 130px">
    @if ($message = Session::get('error'))
    <div class="alert alert-danger" role="alert">
        {{$message}}<br>
    </div>
    @endif

    @if (count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{$error}}<br>
    </div>
    @endforeach
    @endif
    <div class="card">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">

            <small id="emailHelp" class="form-text text-muted">Por favor, faça o login.</small>
            <br>
            <form method="post" action="{{route('logar')}}">
                {{ csrf_field()}}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="e-mail" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="senha" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <button type="submit" name="login" value="login" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Logar</button>
            </form>
        </div>
    </div>

</div>




@endsection