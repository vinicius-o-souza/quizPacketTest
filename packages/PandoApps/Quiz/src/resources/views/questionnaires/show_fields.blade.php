<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Nome:') !!}
    <p>{!! $questionnaire->name !!}</p>
</div>

<!-- Display Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('answer_once', 'Resposta Única:') !!}
    <p>{!! $questionnaire->answer_once ? 'Sim' : 'Não' !!}</p>
</div>
