<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\view\view;

class StudentController extends Controller
{
   
    public function index()
    {
        $students = Student::all();
        // return $students;
        return view('student.index',compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function view($id){
        $ogId = decrypt($id);
        $student = Student::find($ogId);
        // return $student;
        return view('student.view',compact('student'));
    }

    
    public function save(Request $request)
    {

          if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Create a unique name
            $imagePath = $image->storeAs('images', $imageName, 'public'); // Store in the 'images' directory
        }
        $student= Student::create([
            'name'=>request('name'),
            'adress'=>request('adress'),
            'age'=>request('age'),
            'mobile'=>request('mobile'),
            'image'=>$imagePath
        ]);
        return redirect()->route('student.home')->with('message','student Added sucessfully!!!');
    }

  
    
    public function edit($id)
    {
        $studentId = decrypt($id);
        $student = Student::find($studentId);
        return view('student.edit',compact('student'));
    }

    public function update(Request $request){ 
        $id = decrypt(request("student_Id"));
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Create a unique name
            $imagePath = $image->storeAs('images', $imageName, 'public'); // Store in the 'images' directory
        }
        $student= Student::find($id)->update([
            'name'=>request('name'),
            'adress'=>request('adress'),
            'age'=>request('age'),
            'mobile'=>request('mobile'),
            'image'=>$imagePath
        ]);
        return redirect()->route('student.home')->with('message','student Updated sucessfully!!!');

    }

    public function delete($id)
    {
        $stdntId =  decrypt($id);
        $student = Student::find($stdntId)->delete();

        return redirect()->route('student.home')->with(['message'=>'student Deleted sucessfully!!!','delete'=>true]);
    }
}
