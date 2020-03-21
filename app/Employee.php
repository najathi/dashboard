<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name','last_name','gender','civil_status','dob','address_1','address_2','nic','passport_photo','mobile_no','email','designation_id',
        'district_id','division_id','gn_division','gov_front_image','gov_back_image','sim_no','sim_serial_no','parent_code'
    ];

    public function passportPhoto()
    {
        return $this->hasMany('App\Photo', 'passport_photo');
    }

    public function govFPhoto()
    {
        return $this->hasMany('App\Photo', 'gov_front_image');
    }

    public function govBPhoto()
    {
        return $this->hasMany('App\Photo', 'gov_back_image');
    }

    public function designation()
    {
        return $this->belongsTo('App\Designation');
    }

    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function division()
    {
        return $this->belongsTo('App\Division');
    }


}
