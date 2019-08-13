<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $attentionLevel->name !!}</p>
</div>

<!-- Display Name Field -->
<div class="form-group">
    {!! Form::label('answer_once', 'Resposta Única:') !!}
    <p>{!! $attentionLevel->answer_once ? 'Sim' : 'Não' !!}</p>
</div>
