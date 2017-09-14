<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $table = 'recommendation';

    protected $fillable = [
        "title",
        "body",
    ];

    protected $hidden = ['recommender_trainer_id', 'recommended_trainer_id'];

    /**
     * Get the recommender
     *
     * @return recommender as App\User
     */
    public function recommender()
    {
        return $this->belongsTo('App\User', "recommender_trainer_id")->first();
    }

    /**
     * Get the recommendee
     *
     * @return recommendee as App\User
     */
    public function recommendee()
    {
        return $this->belongsTo('App\User', "recommended_trainer_id")->first();
    }
}
