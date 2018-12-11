<div class="row">
    <div class="form-group col-md-12">
        <label>{{$label}}</label>
        <div class="input-group">
            <span class="input-group-prepend">
                <div id="lfm{{$id ?? ''}}" data-input="thumbnail{{$id}}" style="height:40px; line-height:25px;" data-preview="holder{{$id}}" class="btn btn-primary">
                    <i class="fas fa-cloud-upload-alt"></i> {{$textoBotao ?? 'Selecione o Arquivo'}}
                </div>
            </span>
            {!! Form::text($campoNome, null, ['class' => 'form-control', 'placeholder' => '', 'id' => 'thumbnail'.$id])!!}
        </div>
        <br>
        @if(isset($campoValor))
        <img id="holder{{$id}}" src="{{ url($campoValor)}}" style="max-width: 200px">
        @else
        <img id="holder{{$id}}" src="" style="max-width: 200px">
        @endif
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#lfm{{$id}}').filemanager('image');
    });
</script>