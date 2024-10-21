@extends('layoutes.master')
@section('title', 'update-batches')
@section('content')

    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Update Batche Details</h1>
    </div>

    <div style="width: 400px" class="mx-auto">
        <form action="{{route('batches.update')}}" method="POST">
            @csrf
            <input hidden name="batches_Id" value="{{encrypt($batches->batches_Id)}}" />
            <div class="mb-3">
                <label  class="form-label">Batch Name</label>
                <input type="text" value="{{$batches->name}}" name="name" class="form-control" placeholder="Name" >
            </div>
            <div class="mb-3">
                <label class="form-label">Courses</label>
                <select name="course_Id"  class="form-control">
                    <option value="" selected disabled>Select Courses</option>
                    @foreach ($courses as $course)
                    <option value="{{ $course->course_Id }}" 
                        {{ $course->course_Id === $batches->course_Id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Starte Date</label>
                <input type="date" placeholder="Batch started Date" name="start_date" value="{{$batches->start_date}}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
@endsection
