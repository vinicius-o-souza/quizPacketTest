<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Título:') !!}
    <p> {!! $question->title !!}</p>
</div>

<!-- Body Field -->
<div class="form-group col-sm-6">
    {!! Form::label('body', 'Descrição:') !!}
    <p> {!! $question->body !!}</p>
</div>

<!-- Hint Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hint', 'Dica:') !!}
    <p> {!! $question->hint !!}</p>
</div>

<!-- Is Required Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_required', 'Resposta obrigatória?') !!}
    <p>{!! $questionnaire->is_required ? 'Sim' : 'Não' !!}</p>
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Resposta ativa?') !!}
    <p>{!! $questionnaire->is_active ? 'Sim' : 'Não' !!}</p>
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight', 'Peso da questão:') !!}
    <p> {!! $question->weight !!}</p>
</div>

