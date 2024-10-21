@extends('layoutes.master')
@section('title', 'courses-home')
@section('content')
<div class="container">

    <h1 class='mt-5 text-center fw-bolder'>course Details</h1>
    <div class='d-flex justify-content-end'>
        <a class='btn btn-primary ' href="{{route('course.create')}}">New</a>
    </div>
    @if (session()->has('message'))
    <div class=''>
        <p class="{{ session()->has('delete') ? 'text-danger' : 'text-success' }}  fw-bold">{{ session()->get('message') }}</p>
    </div>
    @endif
    <table class=" mt-5 table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Duration</th>
                <th scope="col">Amount</th>
                <th scope="col">Syllabus</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
  

        <tbody>
            @if($courses && count($courses) > 0)
                @foreach ($courses as $course)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $course->name ?? 'N/A' }}</td>
                        <td>{{ $course->duration() ?? 'N/A' }}</td>
                        <td>{{ $course->amount ?? 'N/A' }}</td>
                        <td>{{ $course->syllabus ?? 'N/A' }}</td>
                        <td>
                            <a class='btn btn-success me-2' 
                               href="{{ route('course.view', encrypt($course->course_Id)) }}">View</a>
                            <a class='btn btn-primary me-2' 
                               href="{{ route('course.edit', encrypt($course->course_Id)) }}">Edit</a>
                            <a class='btn btn-danger' 
                               href="{{ route('course.delete', encrypt($course->course_Id)) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center text-danger"><strong>No Courses available</strong></td>
                </tr>
            @endif
        </tbody>
    </table>
    
</div>
    
    @endsection
    