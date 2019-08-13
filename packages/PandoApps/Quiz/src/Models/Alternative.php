<?php

namespace PandoApps\Quiz\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alternative extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alternatives';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'question_id',
        'value'
    ];

    /**
     * Get the question of the alternative.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
