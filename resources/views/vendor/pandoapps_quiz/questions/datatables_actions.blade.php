{!! Form::open(['route' => ['questions.destroy', 'questionnaire_id', request()->questionnaire_id, $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('questions.show', ['questionnaire_id' => request()->questionnaire_id, 'question_id' => $id]) }}" class='btn btn-info'>
       <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('questions.edit', ['questionnaire_id' => request()->questionnaire_id, 'question_id' => $id]) }}" class='btn btn-warning'>
       <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger',
        'onclick' => "return confirm('Deseja realmente deletar?')"
    ]) !!}
</div>
{!! Form::close() !!}
