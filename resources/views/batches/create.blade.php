@extends('layoutes.master')
@section('title', 'create-batches')
@section('content')

    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Create batches</h1>
    </div>

    <div style="width: 400px" class="mx-auto">
        <form action="{{ route('batches.save') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Batch Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Courses</label>
                <select name="course_Id" class="form-control">
                    <option value="" selected disabled>Select Courses</option>
                    @if ($course && count($course) > 0)
                        @foreach ($course as $course)
                            <option value="{{ $course->course_Id }}">{{ $course->name }}</option>
                        @endforeach
                    @else
                        <option value="" selected>No Course Available</option>
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Starte Date</label>
                <input type="date" placeholder="Batch started Date" name="start_date" class="form-control">
            </div>
         
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
@endsection
