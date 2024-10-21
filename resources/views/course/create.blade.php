@extends('layoutes.master')
@section('title', 'create-course')
@section('content')

    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Create Course</h1>
    </div>

    <div style="width: 400px" class="mx-auto">
        <form action="{{route('course.save')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Cource_Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Cource_duration</label>
                <input type="text" name="duration" placeholder="duration" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Amount</label>
                <input type="number" placeholder="amount"  name="amount" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Syllabus</label>
                <input type="text" placeholder="syllabus"  name="syllabus" class="form-control" >
            </div>
           
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
@endsection
