<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    
    protected $table = 'payments';
    

    protected $primaryKey = 'payment_Id';
    
    protected $guarded = []; 

    public function entrollment()
    {
        return $this->belongsTo(Entrollment::class, 'entrolment_Id');
    }

    

   

    use HasFactory;
}
