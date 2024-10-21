<?php

namespace App\Http\Controllers;
use App\Models\Course;


use Illuminate\Http\Request;

class CourseController extends Controller
{
   
    public function index()
    {
        $courses = Course::all();
        // return $courses;
        return view('course.index',compact('courses'));
    }

    public function create()
    {
        return view('course.create');
    }

    public function view($id){
        $ogId = decrypt($id);
        $course = Course::find($ogId);
        // return $course;
        return view('course.view',compact('course'));
    }

    
    public function save()
    {
        $course= Course::create([
            'name'=>request('name'),
            'duration'=>request('duration'),
            'amount'=>request('amount'),
            'syllabus'=>request('syllabus'),
        ]);
        return redirect()->route('course.home')->with('message','course Added sucessfully!!!');
    }

  
    
    public function edit($id)
    {
        $courseId = decrypt($id);
        $course = Course::find($courseId);
        return view('course.edit',compact('course'));
    }

    public function update(){
        $id = decrypt(request("course_Id"));
        $course= Course::find($id)->update([
            'name'=>request('name'),
            'duration'=>request('duration'),
            'amount'=>request('amount'),
            'syllabus'=>request('syllabus'),
        ]);
        return redirect()->route('course.home')->with('message','course Updated sucessfully!!!');

    }

    public function delete($id)
    {
        $stdntId =  decrypt($id);
        $course = Course::find($stdntId)->delete();

        return redirect()->route('course.home')->with(['message'=>'course Deleted sucessfully!!!','delete'=>true]);
    }
}
