<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceFee extends Model
{
    protected $table = "service_fee";

    protected $fillable = [
        "name",
        "price"
    ];

    protected $hidden = [
        "trainer_id"
    ];

}
