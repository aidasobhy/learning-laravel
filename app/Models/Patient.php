<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table='patients';
    protected $fillable=['name','age','created_at','updated_at'];
    public $hidden=['created_at','updated_at'];
    public $timestamps=false;


    public function doctor()
    {
        return $this->hasOneThrough('App\Models\Doctor','App\Models\Medical',
            'patient_id','medical_id','id','id');
    }
}
