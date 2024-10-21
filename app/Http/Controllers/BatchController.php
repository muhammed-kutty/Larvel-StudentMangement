<?php

namespace App\Http\Controllers;
use App\Models\Batch;
use App\Models\Course;



use Illuminate\Http\Request;

class BatchController extends Controller
{
   
    public function index()
    {
        $batches = Batch::with('course')->get();

        // return $batchess;
        return view('batches.index',compact('batches'));
    }

    public function create()
    {
        $course=Course::all();
        return view('batches.create',compact('course'));
    }

    public function view($id){
        $ogId = decrypt($id);
        $batches = Batch::find($ogId);
        // return $batches;
        return view('batches.view',compact('batches'));
    }

    
    public function save(Request $req)
    {
        $input= $req->all(); 
         Batch::create($input);
        return redirect()->route('batches.home')->with('message','batches Added sucessfully!!!');
    }

  
    
    public function edit($id)
    {
        $batchesId = decrypt($id);
        $batches = Batch::with('course')->findOrFail($batchesId);
        $courses = Course::all();
        // return $batches;
        return view('batches.edit',compact('batches','courses'));
    }

    public function update(Request $req){
        $id = decrypt($req->batches_Id);
        $batches= Batch::find($id)->update([
            'name'=>$req->name,
            'course_Id'=>$req->course_Id,
            'start_date'=>$req->start_date,
        ]);
        // return $batches;
        return redirect()->route('batches.home')->with('message','batches Updated sucessfully!!!');

    }

    public function delete($id)
    {
        $stdntId =  decrypt($id);
        $batches = Batch::find($stdntId)->delete();

        return redirect()->route('batches.home')->with(['message'=>'batches Deleted sucessfully!!!','delete'=>true]);
    }
}
