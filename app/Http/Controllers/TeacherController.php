<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;


class TeacherController extends Controller

{
   
    public function index()
    {
        $teachers = Teacher::all();
        // return $teachers;
        return view('teacher.index',compact('teachers'));
    }

    public function create()
    {
        return view('teacher.create');
    }

    public function view($id){
        $ogId = decrypt($id);
        $teacher = Teacher::find($ogId);
        // return $teacher;
        return view('teacher.view',compact('teacher'));
    }

    
    public function save(Request $request)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Create a unique name
            $imagePath = $image->storeAs('images', $imageName, 'public'); // Store in the 'images' directory
        }
        $teacher= Teacher::create([
            'name'=>request('name'),
            'adress'=>request('adress'),
            'age'=>request('age'),
            'mobile'=>request('mobile'),
            'image'=>$imagePath

        ]);
        return redirect()->route('teacher.home')->with('message','teacher Added sucessfully!!!');
    }

  
    
    public function edit($id)
    {
        $teacherId = decrypt($id);
        $teacher = Teacher::find($teacherId);
        return view('teacher.edit',compact('teacher'));
    }

    public function update(Request $request){
        $id = decrypt(request("teacher_Id"));
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Create a unique name
            $imagePath = $image->storeAs('images', $imageName, 'public'); // Store in the 'images' directory
        }
        $teacher= Teacher::find($id)->update([
            'name'=>request('name'),
            'adress'=>request('adress'),
            'age'=>request('age'),
            'mobile'=>request('mobile'),
            'image'=>$imagePath

        ]);
        return redirect()->route('teacher.home')->with('message','teacher Updated sucessfully!!!');

    }
 
    public function delete($id)
    {
        $stdntId =  decrypt($id);
        $teacher = Teacher::find($stdntId)->delete();

        return redirect()->route('teacher.home')->with(['message'=>'teacher Deleted sucessfully!!!','delete'=>true]);
    }
}

