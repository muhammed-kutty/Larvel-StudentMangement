@extends('layoutes.master')
@section('title', 'teachers-home')
@section('content')
<div class="container">

    <h1 class='mt-5 text-center fw-bolder'>Teachers Details</h1>
    <div class='d-flex justify-content-end'>
        <a class='btn btn-primary ' href="{{route('teacher.create')}}">New</a>
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
            @if($teachers && count($teachers) > 0)
                @foreach ($teachers as $teacher)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $teacher->name ?? 'N/A' }}</td>
                        <td>{{ $teacher->mobile ?? 'N/A' }}</td>
                        <td>{{ $teacher->age ?? 'N/A' }}</td>
                        <td>{{ $teacher->adress ?? 'N/A' }}</td>
                        <td>
                            <a class='btn btn-success me-2' 
                               href="{{ route('teacher.view', encrypt($teacher->teacher_Id)) }}">View</a>
                            <a class='btn btn-primary me-2' 
                               href="{{ route('teacher.edit', encrypt($teacher->teacher_Id)) }}">Edit</a>
                            <a class='btn btn-danger' 
                               href="{{ route('teacher.delete', encrypt($teacher->teacher_Id)) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center text-danger"><strong>No Teachers available</strong></td>
                </tr>
            @endif
        </tbody>
    </table>
    
</div>
    
    @endsection
    