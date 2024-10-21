@extends('layoutes.master')
@section('title', 'batches-home')
@section('content')
<div class="container">

    <h1 class='mt-5 text-center fw-bolder'>Batches Details</h1>
    <div class='d-flex justify-content-end'>
        <a class='btn btn-primary ' href="{{route('batches.create')}}">New</a>
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
                <th scope="col">Course Name</th>
                <th scope="col">Started_date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
  

        <tbody>
            @if($batches && count($batches) > 0)
                @foreach ($batches as $batches)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $batches->name ?? 'N/A' }}</td>
                        <td>{{ $batches->course->name ?? 'N/A' }}</td>
                        <td>{{ $batches->start_date ?? 'N/A' }}</td>
                        <td>
                            <a class='btn btn-success me-2' 
                               href="{{ route('batches.view', encrypt($batches->batches_Id)) }}">View</a>
                            <a class='btn btn-primary me-2' 
                               href="{{ route('batches.edit', encrypt($batches->batches_Id)) }}">Edit</a>
                            <a class='btn btn-danger' 
                               href="{{ route('batches.delete', encrypt($batches->batches_Id)) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center text-danger"><strong>No batches available</strong></td>
                </tr>
            @endif
        </tbody>
    </table>
    
</div>
    
    @endsection
    