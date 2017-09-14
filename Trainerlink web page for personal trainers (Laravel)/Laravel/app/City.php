<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "city";

    protected $fillable = [
        "name"
    ];

    protected $hidden = ['region_id'];

    /**
     * Get the region this city belongs to
     *
     * @return region as App\Region
     */
    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    /**
     * Get the trainers of this city
     *
     * @return array of App\User
     */
    public function trainers()
    {
        return $this->hasMany('App\User');
    }
}
