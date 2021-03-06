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

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>Questões</h4>
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($questionnaire->questions as $key => $question)
            <li class="list-group-item" id="question_{!! $question->id !!}">
                <div class="row">
                    <div class="col-sm-12 col-md-2 d-flex align-items-center">
                        <h2><b> Questão {!! $key + 1 !!} </b></h2>
                    </div>
                    <div class="col-sm-12 col-md-10">
                        <div class="row">
                            <!-- Description Field -->
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Descrição:</label>
                                <p>{!! $question->description !!}</p>
                            </div>

                            <!-- Hint Field -->
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Dica:</label>
                                <p>{!! $question->hint !!}</p>
                            </div>
                            
                            <!-- Weight Field -->
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Peso da questão:</label>
                                <p> {!! $question->weight !!}</p>
                            </div>
        
                            <!-- Is Required Field -->
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Obrigatória?</label>
                                <p>{!! $question->is_required ? 'Sim' : 'Não' !!}</p>
                            </div>
                            
                            <!-- Question Type Field -->
                            <div class="form-group col-sm-12 col-md-6">
                                <label> Tipo da questão: </label>
                                <p>{!! $question->questionType->name !!}</p>
                            </div>
                            
                            @if ($question->alternatives)
                                @foreach ($question->alternatives as $key => $alternative)
                                    <div class="col-sm-12 row alternatives" id="alternative_{!! $alternative->id !!}">
                                        <hr class="col-sm-12">
                                        <div class="col-sm-12 col-md-3 d-flex align-items-center">
                                            <h4><b> Alternativa {!! $key + 1 !!} </b></h4>
                                        </div>
                                        <div class="col-sm-12 col-md-9 row">
                                            <!-- Description Field -->
                                            <div class="form-group col-sm-12 col-md-6">
                                                <label>Descrição:</label>
                                                <p> {!! $alternative->description !!}</p>
                                            </div>
                                            
                                            <!-- Value Field -->
                                            <div class="form-group col-sm-12 col-md-6">
                                                <label>Peso da alternativa:</label>
                                                <p> {!! $alternative->value !!}</p>
                                            </div>
                                            
                                            <!-- Is Correct Field -->
                                            <div class="form-group col-sm-12 col-md-6">
                                                <label>Alternativa correta?</label>
                                                <p>{!! $alternative->is_correct ? 'Sim' : 'Não' !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>  
    </div>      
</div>
