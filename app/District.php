<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name','short_code'
    ];

    public function divisions()
    {
        return $this->hasMany('App\Division');
    }
}
