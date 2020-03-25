<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'civil_status', 'dob', 'address_1', 'address_2', 'nic', 'passport_photo', 'mobile_no', 'email', 'designation_id',
        'district_id', 'division_id', 'gn_division', 'gov_f_photo', 'gov_b_photo', 'sim_no', 'sim_serial_no', 'emp_code', 'signature'
    ];

    public function passport_photo()
    {
        return $this->belongsTo('App\Photo', 'passport_photo');
    }

    public function gov_f_photo()
    {
        return $this->belongsTo('App\Photo', 'gov_f_photo');
    }

    public function gov_b_photo()
    {
        return $this->belongsTo('App\Photo', 'gov_b_photo');
    }

    public function signature()
    {
        return $this->belongsTo('App\Photo', 'signature');
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
