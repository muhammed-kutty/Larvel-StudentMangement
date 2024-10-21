<?php

namespace App\Http\Controllers;
use Tymon\JWTAuth\Facades\JWTAuth;


use App\Models\Batch;
use App\Models\Student;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Teacher;
use App\Models\Entrollment;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->auth; 
        $token = session('jwt_token');


        if($user){
            $data=[
                'user' => $request->auth, 
                'students' => Student::count(),
                'batches' => Batch::count(),
                'courses' => Course::count(),
                'studentwisePaymentDetails' =>Entrollment::with(['batch','batch.course','student'])->get(),
                'teachers' => Teacher::count(),
            ];
            // return $data;
            return view('index', $data);
        }

        // Return the view with the authenticated user
    }
}
