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
        'title',
        'question_id',
        'user_identification_id',
        'score',
        'alternative_id'
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
     * Get the user of the answer.
     */
    public function user()
    {
        return $this->belongsTo(UserIdentification::class);
    }
}
