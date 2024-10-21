@extends('layoutes.master')
@section('title', 'update-student')
@section('content')

    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Update Student</h1>
    </div>

    <div style="width: 400px" class="mx-auto">
        <form action="{{route('student.update')}}" method="POST">
            @csrf
            <input hidden name="student_Id" value="{{encrypt($student->student_Id)}}" />
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" value="{{$student->name}}" name="name" class="form-control" placeholder="Name" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Adress</label>
                <input type="text" name="adress" value="{{$student->adress}}" placeholder="Adress" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Age</label>
                <input type="number" placeholder="age" value="{{$student->age}}" name="age" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">mobile</label>
                <input type="number" placeholder="Mobile" value="{{$student->mobile}}"  name="mobile" class="form-control" >
            </div>
           
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
@endsection
