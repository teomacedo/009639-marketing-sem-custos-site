<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{{$titulo ?? 'Nuc Tecnologia'}}</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        
        <link rel="shortcut icon" href="{{ URL::asset('photos/shares/nuc-logos/nuc-icon.png') }}" />

        <script src="{{ URL::asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
        
        <script src="{{ URL::asset('js/adm.js') }}"></script>
        @yield('head')

    </head>

    <body class="bg-light">
        <div class="card">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="min-height: 72px;">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="{{ URL::asset('photos/shares/nuc-logos/logo.png') }}" width="100" height="30" class="d-inline-block align-top" alt="">
                        Tecnologia&nbsp;&nbsp;&nbsp;
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        @yield('menu')
                    </div>

                </div>
            </nav>
        </div>

        @yield('content')

        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        
    </body>

</html>






