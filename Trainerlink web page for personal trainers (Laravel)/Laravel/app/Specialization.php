<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $table = 'specialization';

    protected $fillable = [
        'name'
    ];

    /**
     * Get the trainers of this specialization
     *
     * @return array of App\User
     */
    public function trainers()
    {
        return $this->belongsToMany('App\User', 'trainer_specialization', 'specialization_id', 'trainer_id');
    }
}
