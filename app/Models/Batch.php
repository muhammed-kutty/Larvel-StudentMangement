<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{

    protected $table = 'batches';
    

    protected $primaryKey = 'batches_Id';
    
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_Id'); // Foreign key 'course_Id'
    }

    public function entrolments()
    {
        return $this->hasMany(Entrollment::class, 'batches_Id');
    }
    
    use HasFactory;
}
