@extends('layoutes.master')
@section('title', 'update-teacher')
@section('content')
 
    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Update Teachers Profile</h1>
    </div>

    <div style="width: 400px" class="mx-auto">
        <form action="{{route('teacher.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input hidden name="teacher_Id" value="{{encrypt($teacher->teacher_Id)}}" />
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" value="{{$teacher->name}}" name="name" class="form-control" placeholder="Name" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Adress</label>
                <input type="text" name="adress" value="{{$teacher->adress}}" placeholder="Adress" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Age</label>
                <input type="number" placeholder="age" value="{{$teacher->age}}" name="age" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">mobile</label>
                <input type="number" placeholder="Mobile" value="{{$teacher->mobile}}"  name="mobile" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Upload Image</label>
                <input type="file"  name="image" class="form-control" onchange="previewImage(event)">
            </div>
            <div class="form-group">
                <img id="imagePreview" src="{{$teacher ? asset('storage/' . $teacher->image) : '#' }}" alt="Image Preview" style="{{$teacher->image ? 'display:block; width: 200px; height: auto;' :' display:none; width: 200px; height: auto;'}}" />
            </div>
           
           
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
@endsection
