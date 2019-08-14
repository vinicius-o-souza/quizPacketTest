<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $questionnaire->name !!}</p>
</div>

<!-- Display Name Field -->
<div class="form-group">
    {!! Form::label('answer_once', 'Resposta Única:') !!}
    <p>{!! $questionnaire->answer_once ? 'Sim' : 'Não' !!}</p>
</div>
