<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "region";

    protected $fillable = [
        "name"
    ];

    /**
     * Get the cities that belong to this region
     *
     * @return array of App\City
     */
    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
