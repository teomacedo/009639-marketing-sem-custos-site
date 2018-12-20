<td>{{$row->sequencia}}</th>
<td>
    @if($row->titulo != '')
    <b>Título: </b>{{$row->titulo}}<br>
    @endif

    @if($row->subtitulo != '')
    <b>Subitítulo: </b>{{$row->subtitulo}}<br>
    @endif

    @if($row->trecho != '')
    <b>Trecho: </b>{{$row->trecho}}<br>
    @endif

    @if($row->video != '')
    <b>Vídeo: </b>
    <div class='embed-responsive embed-responsive-16by9'>
        <iframe class='embed-responsive-item' src='{{$row->video}}' allowfullscreen></iframe>
    </div>
    @endif
</th>
<td>
    @if($row->imagem != '')
    <img src="{{ url(''.$row->imagem)}}" width="150px">
    @endif
</th>






