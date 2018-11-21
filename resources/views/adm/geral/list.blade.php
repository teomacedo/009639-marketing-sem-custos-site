@extends('adm.geral.estrutura-painel')
@section('area-especifica')

<div class="card">
    <h5 class="card-header">{{$titulo ?? 'Itens'}}</h5>
    <div class="card-body">

        <table class="table">
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
                    @include('adm.'.$path.'.registros')
                    <td>
                        <a href="{{url($diretorio.'/'.$row->id.'/edit')}}"><span class="badge badge-primary"><i class="fas fa-pen"></i></span></a>
                        <a onclick="deletarDefault('{{url($diretorio.'/destroy', $row->id)}}')" style="cursor: pointer"><span class="badge badge-danger"><i class="fas fa-trash"></i></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{url($diretorio.'/create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Cadastrar</a>
    </div>
</div>

<br>
<a href="{{route('painel')}}">
    <button type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-circle-left"></i> Voltar</button>
</a>

@endsection