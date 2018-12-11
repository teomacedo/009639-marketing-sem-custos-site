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
                    @foreach($dadosBase['tabelaColunas'] as $coluna)
                    <th scope="col">{{$coluna}}</th>
                    @endforeach
                    @if(($dadosBase['crudFuncoes']['show'] == 'yes') || ($dadosBase['crudFuncoes']['edit'] == 'yes') || ($dadosBase['crudFuncoes']['delete'] == 'yes'))
                    <th scope="col" width="100">Ação</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($dadosBase['model'] as $row)
                <tr>
                    @include('adm.'.$dadosBase['nomeClasse'].'.list')
                    <td>
                        @if($dadosBase['crudFuncoes']['edit'] == 'yes')
                        <a href="{{url($dadosBase['diretorio'].'/'.$row->id.'/edit')}}/{{$foreign ?? ''}}"><span class="badge badge-primary"><i class="fas fa-pen"></i></span></a>
                        @endif
                        
                        @if($dadosBase['crudFuncoes']['show'] == 'yes')
                        <a href="{{url($dadosBase['diretorio'].'/'.$row->id)}}/{{$foreign ?? ''}}"><span class="badge badge-success"><i class="far fa-eye"></i></span></a>
                        @endif
                        
                        @if($dadosBase['crudFuncoes']['delete'] == 'yes')
                        <a onclick="deletarDefault('{{url($dadosBase['diretorio'].'/destroy/'.$row->id)}}/{{$foreign ?? ''}}')" style="cursor: pointer"><span class="badge badge-danger"><i class="fas fa-trash"></i></span></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


        <div class="alert alert-warning desktop-off" role="alert">
            Visualização indisponível para o tamanho de tela desse dispositivo.
            Por favor, acesse esse conteúdo em computadores ou notebooks.
        </div>
        @if($dadosBase['crudFuncoes']['create'] == 'yes')
        <a href="{{url($dadosBase['diretorio'].'/create')}}/{{$foreign ?? ''}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Cadastrar</a>
        @endif
    </div>
</div>

<br>
<a href="{{route('painel')}}">
    <button type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-circle-left"></i> Voltar</button>
</a>

@endsection