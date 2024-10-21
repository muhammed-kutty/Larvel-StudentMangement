@extends('layoutes.master')
@section('title', 'create-student')
@section('content')

    <div class='mt-5'> 
        <h1 class='text-center fw-bolder mb-3'>Create Student</h1>
    </div>

    <div style="width: 400px" class="mx-auto">
        <form action="{{route('student.save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Adress</label>
                <input type="text" name="adress" placeholder="Adress" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Age</label>
                <input type="number" placeholder="age"  name="age" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">mobile</label>
                <input type="number" placeholder="Mobile"  name="mobile" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Upload Image</label>
                <input type="file"  name="image" class="form-control" onchange="previewImage(event)">
            </div>
            <div class="form-group">
                <img id="imagePreview" src="#" alt="Image Preview" style="display:none; width: 200px; height: auto;" />
            </div>
           
            <button type="submit" class="btn btn-primary mb-5 mt-2">Submit</button>
        </form>
    </div>
@endsection
