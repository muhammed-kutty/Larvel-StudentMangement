<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    protected $table = 'students';
    

    protected $primaryKey = 'student_Id';
    
    protected $guarded = [];
    
    public function entrolments()
    {
        return $this->hasMany(Entrollment::class, 'student_Id');
    }
    
    use HasFactory;

}
