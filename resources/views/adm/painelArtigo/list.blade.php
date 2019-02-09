<td>{{$row->id}}</th>
<td>
    @if($row->publicado == 0)
    Não
    @else
    Sim
    @endif
</th>
<td>{!!$row->titulo!!}</th>
<td>{!!$row->subtitulo!!}</th>
<td>{{$row->categoria()->nome}}</th>





