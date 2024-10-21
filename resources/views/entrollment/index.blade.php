@extends('layoutes.master')
@section('title', 'entrollment-home')
@section('content')
<div class="container">

    <h1 class='mt-5 text-center fw-bolder'>entrollment Details</h1>
    <div class='d-flex justify-content-end'>
        <a class='btn btn-primary ' href="{{route('entrollment.create')}}">New</a>
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
                <th scope="col">Entroll number</th>
                <th scope="col">Student Name</th>
                <th scope="col">Batch Name</th>
                <th scope="col">Admission_date</th>
                <th scope="col">Fees</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
  

        <tbody>
            @if($entrollment && count($entrollment) > 0)
                @foreach ($entrollment as $entrollment)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $entrollment->entroll_No ?? 'N/A' }}</td>
                        <td>{{ $entrollment->student->name ?? 'N/A' }}</td>
                        <td>{{ $entrollment->batch->name ?? 'N/A' }}</td>
                        <td>{{ $entrollment->admission_date	 ?? 'N/A' }}</td>
                        <td>{{ $entrollment->fee	 ?? 'N/A' }}</td>
                        <td>
                            <a class='btn btn-success me-2' 
                               href="{{ route('entrollment.view', encrypt($entrollment->entrollment_Id)) }}">View</a>
                            <a class='btn btn-primary me-2' 
                               href="{{ route('entrollment.edit', encrypt($entrollment->entrollment_Id)) }}">Edit</a>
                            <a class='btn btn-danger' 
                               href="{{ route('entrollment.delete', encrypt($entrollment->entrollment_Id)) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center text-danger"><strong>No entrollment available</strong></td>
                </tr>
            @endif
        </tbody>
    </table>
    
</div>
    
    @endsection
    