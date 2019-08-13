<?php

namespace PandoApps\Quiz\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserIdentification extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_identification';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'questionnaire_id',
    ];

    /**
     * Get the user of the user_identification.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the question_type of the user_identification.
     */
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
}
