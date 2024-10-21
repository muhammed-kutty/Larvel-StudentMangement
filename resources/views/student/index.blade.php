@extends('layoutes.master')
@section('title', 'students-home')
@section('content')
<div class="container">

    <h1 class='mt-5 text-center fw-bolder'>Students Details</h1>
    <div class='d-flex justify-content-end'>
        <a class='btn btn-primary ' href="{{route('student.create')}}">New</a>
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
                <th scope="col">Mobile</th>
                <th scope="col">Age</th>
                <th scope="col">Adress</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($students && count($students) > 0)
                @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $student->name ?? 'N/A' }}</td>
                        <td>{{ $student->mobile ?? 'N/A' }}</td>
                        <td>{{ $student->age ?? 'N/A' }}</td>
                        <td>{{ $student->adress ?? 'N/A' }}</td>
                        <td>
                            <a class='btn btn-success me-2' 
                               href="{{ route('student.view', encrypt($student->student_Id)) }}">View</a>
                            <a class='btn btn-primary me-2' 
                               href="{{ route('student.edit', encrypt($student->student_Id)) }}">Edit</a>
                            <a class='btn btn-danger' 
                               href="{{ route('student.delete', encrypt($student->student_Id)) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center text-danger"><strong>No students available</strong></td>
                </tr>
            @endif
        </tbody>
    </table>
    
</div>
    
    @endsection
    