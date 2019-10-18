<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function school()
    {
        return $this->belongsTo(School::class );
    }
   
    public function getSexAttribute($value)
    {
        return  config('constant.GENDER_ENUM')[$value];
       
    }
    public function getStudentTypeAttribute($value)
    {
        return  str_replace('_', ' ',config('constant.Student_Type'))[$value];
       
    }
    public function getReligionAttribute($value)
    {
        if(!empty($value))
        {
            return  config('constant.Religion')[$value];
        }else{
            return "";
        }
    }
    public function getMotherTongueAttribute($value)
    {
        if(!empty($value))
        {
            return  config('constant.Language')[$value];
        }else{
            return "";
        }
    }

}


