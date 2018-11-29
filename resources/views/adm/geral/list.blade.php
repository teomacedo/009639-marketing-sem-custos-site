@extends('adm.geral.estrutura-painel')
@section('area-especifica')

<style type="text/css">
    @media (max-width: 992px) {
        .small-off{
            display: none;
        }
    }

    @media (min-width: 993px) {
        .desktop-off{
            display: none;
        }
    }
</style>

<div class="card">
    <h5 class="card-header">{{$titulo ?? 'Itens'}}</h5>
    <div class="card-body">

        <table class="table small-off">
            <thead>
                <tr>
                    @foreach($tabelaColunas as $coluna)
                    <th scope="col">{{$coluna}}</th>
                    @endforeach
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($model as $row)
                <tr>
                    @include('adm.'.$path.'.list')
                    <td>
                        <a href="{{url($diretorio.'/'.$row->id.'/edit')}}"><span class="badge badge-primary"><i class="fas fa-pen"></i></span></a>
                        <a href="{{url($diretorio.'/'.$row->id)}}"><span class="badge badge-success"><i class="far fa-eye"></i></span></a>
                        <a onclick="deletarDefault('{{url($diretorio.'/destroy', $row->id)}}')" style="cursor: pointer"><span class="badge badge-danger"><i class="fas fa-trash"></i></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


            <div class="alert alert-warning desktop-off" role="alert">
                Visualização indisponível para o tamanho de tela desse dispositivo.
                Por favor, acesse esse conteúdo em computadores ou notebooks.
            </div>



        <a href="{{url($diretorio.'/create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Cadastrar</a>
    </div>
</div>

<br>
<a href="{{route('painel')}}">
    <button type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-circle-left"></i> Voltar</button>
</a>

@endsection