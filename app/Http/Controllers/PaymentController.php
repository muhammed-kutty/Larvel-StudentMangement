<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Entrollment;

use Illuminate\Http\Request;

class PaymentController extends Controller

    {
   
        public function index()
        {
            $payments = Payment::with(['entrollment.student', 'entrollment.batch.course'])->get();
            // $payments = Payment::with('entrollment.batch.course')->get();
            // $payments = Payment::with('entrollments')->get();

    
            // return $payments;
            return view('payment.index',compact('payments'));
        }
    
        public function create()
        {
            $Payment=Payment::all();
            $entrollment = Entrollment::all();
            return view('payment.create',compact('Payment','entrollment'));
        }
    
        public function view($id){
            $ogId = decrypt($id);
            $payments = payment::with(['batch.course', 'student'])->findOrFail($ogId);
            // return $payment;
            return view('payment.view',compact('payments'));
        }
    
        
        public function save(Request $req)
        {
            $input= $req->all(); 
             payment::create($input);
            return redirect()->route('payment.home')->with('message','payment Added sucessfully!!!');
        }
    
      
        
        public function edit($id)
        {
            $paymentId = decrypt($id);
            $payment = payment::with(['batch','student'])->findOrFail($paymentId);
            $batch=Batch::all();
            $student = Student::all();
    
            // return $payment;
            return view('payment.edit',compact('payment','batch','student'));
        }
    
        public function update(Request $req){
            $id = decrypt($req->payment_Id);
            $payment= payment::find($id)->update([
                'entroll_No'=>$req->entroll_No,
                'fee'=>$req->fee,
                'batch_Id'=>$req->batch_Id,
                'student_Id'=>$req->student_Id,
                'admission_date'=>$req->admission_date,
            ]);
            // return $payment;
            return redirect()->route('payment.home')->with('message','payment Updated sucessfully!!!');
    
        }
    
        public function delete($id)
        {
            $stdntId =  decrypt($id);
            $payment = payment::find($stdntId)->delete();
    
            return redirect()->route('payment.home')->with(['message'=>'payment Deleted sucessfully!!!','delete'=>true]);
        }
    }

