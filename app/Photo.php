<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // mass Assignment
    protected $fillable = ['file'];

    protected $upload = '/media/uploads/';

    //accessor
    public function getFileAttribute($photo)
    {
        return $this->upload . $photo;
    }
}
