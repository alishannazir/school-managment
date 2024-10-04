<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'email',
        'password',
        'class_id',
        'academic_year_id',
        'admission_date',
        'father_name',
        'cnic',
        'mobno',
        'dob',
        'address'
    ];  

    // public function academic_year(){

    //     return $this->belongsTo(AcademicYear::class);
    // }
    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class,'academic_year_id');
    }

    public function Class()
    {
        return $this->belongsTo(Classes::class,'class_id');
    }
}
