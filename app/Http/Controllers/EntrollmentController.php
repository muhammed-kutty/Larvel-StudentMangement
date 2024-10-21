<?php

namespace App\Http\Controllers;
use App\Models\Entrollment;
use App\Models\Batch;
use App\Models\Student;

use Illuminate\Http\Request;

class EntrollmentController extends Controller
{
   
    public function index()
    {
        $entrollment = Entrollment::with(['batch','student'])->get();

        // return $entrollment;
        return view('entrollment.index',compact('entrollment'));
    }

    public function create()
    {
        $batch=Batch::all();
        $student = Student::all();
        return view('entrollment.create',compact('batch','student'));
    }

    public function view($id){
        $ogId = decrypt($id);
        $entrollments = Entrollment::with(['batch.course', 'student'])->findOrFail($ogId);
        // return $entrollment;
        return view('entrollment.view',compact('entrollments'));
    }

    
    public function save(Request $req)
    {
        $input= $req->all(); 
         Entrollment::create($input);
        return redirect()->route('entrollment.home')->with('message','entrollment Added sucessfully!!!');
    }

  
    
    public function edit($id)
    {
        $entrollmentId = decrypt($id);
        $entrollment = Entrollment::with(['batch','student'])->findOrFail($entrollmentId);
        $batch=Batch::all();
        $student = Student::all();

        // return $entrollment;
        return view('entrollment.edit',compact('entrollment','batch','student'));
    }

    public function update(Request $req){
        $id = decrypt($req->entrollment_Id);
        $entrollment= Entrollment::find($id)->update([
            'entroll_No'=>$req->entroll_No,
            'fee'=>$req->fee,
            'batch_Id'=>$req->batch_Id,
            'student_Id'=>$req->student_Id,
            'admission_date'=>$req->admission_date,
            'payment_status'=>$req->payment_status,
        ]);
        // return $entrollment;
        return redirect()->route('entrollment.home')->with('message','entrollment Updated sucessfully!!!');

    }

    public function delete($id)
    {
        $stdntId =  decrypt($id);
        $entrollment = Entrollment::find($stdntId)->delete();

        return redirect()->route('entrollment.home')->with(['message'=>'entrollment Deleted sucessfully!!!','delete'=>true]);
    }
}
  