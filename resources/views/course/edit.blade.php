@extends('layoutes.master')
@section('title', 'update-course')
@section('content')

    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Update Courses Details</h1>
    </div>

    <div style="width: 400px" class="mx-auto">
        <form action="{{route('course.update')}}" method="POST">
            @csrf
            <input hidden name="course_Id" value="{{encrypt($course->course_Id)}}" />
            <div class="mb-3">
                <label  class="form-label">Cource_Name</label>
                <input type="text" value="{{$course->name}}" name="name" class="form-control" placeholder="Name" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Cource_duration</label>
                <input type="text" name="duration" value="{{$course->duration}}" placeholder="Adress" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Amount</label>
                <input type="number" placeholder="amount" value="{{$course->amount}}" name="age" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Syllabus</label>
                <input type="text" placeholder="syllabus" value="{{$course->syllabus}}"  name="mobile" class="form-control" >
            </div>
           
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
@endsection
