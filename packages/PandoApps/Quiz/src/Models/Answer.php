<?php

namespace PandoApps\Quiz\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'answers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'question_id',
        'execution_id',
        'score',
        'alternative_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                           => 'integer',
        'description'                  => 'string',
        'score'                        => 'float',
        'execution_id'                 => 'integer',
        'alternative_id'               => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required',
        'alternative_id' => 'required',
        'execution_id' => 'required'
    ];

    /**
     * Get the question of the answer.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the alternative of the answer.
     */
    public function alternative()
    {
        return $this->belongsTo(Alternative::class);
    }

    /**
     * Get the execution of the answer.
     */
    public function execution()
    {
        return $this->belongsTo(Execution::class);
    }
}
