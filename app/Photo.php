<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // mass Assignment
    protected $fillable = ['file'];

    protected $upload = '/images/profile/';

    //accessor
    public function getFileAttribute($photo)
    {
        return $this->upload . $photo;
    }
}
