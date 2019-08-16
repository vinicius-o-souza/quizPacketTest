{!! Form::open(['route' => ['alternatives.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('alternatives.show', $id) }}" class='btn btn-info'>
       <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('alternatives.edit', $id) }}" class='btn btn-warning'>
       <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger',
        'onclick' => "return confirm('Deseja realmente deletar?')"
    ]) !!}
</div>
{!! Form::close() !!}
