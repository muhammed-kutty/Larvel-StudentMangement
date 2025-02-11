<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $table = 'courses';
    

    protected $primaryKey = 'course_Id';
    
    protected $guarded = [];


    public function batches()
    {
        return $this->hasMany(Batch::class, 'course_Id');
    }
    public function duration(){
        return $this->duration." Months";
    }
    
    use HasFactory;
}
