<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'name','short_code','district_id'
    ];

    public function district()
    {
        return $this->belongsTo('App\District');
    }
}
