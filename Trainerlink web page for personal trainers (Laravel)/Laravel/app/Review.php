<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';

    protected $fillable = [
        'user_id',
        'trainer_id',
        'score',
        'title',
        'body',
        'is_flagged',
        'flag_description'
    ];

    protected $hidden = ['user_id', 'trainer_id'];

    /**
     * Get the reviewee
     *
     * @return reviewee as App\User
     */
    public function reviewee()
    {
        return $this->belongsTo('App\User', "trainer_id")->first();
    }

    /**
     * Get the reviewer
     *
     * @return reviewer as App\User
     */
    public function reviewer()
    {
        return $this->belongsTo('App\User', "user_id")->first();
    }


}
