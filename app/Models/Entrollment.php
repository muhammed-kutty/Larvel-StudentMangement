<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrollment extends Model
{

    protected $table = 'entrollments';
    

    protected $primaryKey = 'entrollment_Id';
    
    protected $guarded = []; 

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_Id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_Id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'entrollment_Id');
    }
    
   

    use HasFactory;
}
