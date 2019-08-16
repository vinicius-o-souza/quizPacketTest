<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nome:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Answer Once Field -->
<div class="form-group col-sm-6">
    {!! Form::label('answer_once', 'Resposta única?') !!}
    {!! Form::checkbox('answer_once', null, null) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('questionnaires.index') !!}" class="btn btn-default">Cancelar</a>
</div>
