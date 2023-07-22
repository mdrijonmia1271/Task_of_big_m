<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = ['photo'];

    use HasFactory;

    function RelationWithDivision(){
        return $this->hasOne('App\Models\Division', 'id', 'division_id');
    }
    function RelationWithDistrict(){
        return $this->hasOne('App\Models\District', 'id', 'district_id');
    }
    function RelationWithUpazila(){
        return $this->hasOne('App\Models\Upazila', 'id', 'upazila_id');
    }
}

