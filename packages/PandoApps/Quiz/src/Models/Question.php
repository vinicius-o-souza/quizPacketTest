<?php

namespace PandoApps\Quiz\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_active',
        'title',
        'body',
        'hint',
        'is_required',
        'question_type_id',
        'questionnaire_id',
        'weight'
    ];

    /**
     * Get the questionnaires of the question.
     */
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    /**
     * Get the question_type of the question.
     */
    public function question_type()
    {
        return $this->belongsTo(QuestionType::class);
    }

    /**
     * Get the alternatives for the question.
     */
    public function alternatives()
    {
        return $this->hasMany(Alternative::class);
    }

    /**
     * Get the answers for the question.
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
