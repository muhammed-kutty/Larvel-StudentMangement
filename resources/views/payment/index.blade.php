@extends('layoutes.master')
@section('title', 'payments-home')
@section('content')
<div class="container">

    <h1 class='mt-5 text-center fw-bolder'>Payment Details</h1>
    <div class='d-flex justify-content-end'>
        <a class='btn btn-primary ' href="{{route('payment.create')}}">New</a>
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
                <th scope="col">Amount</th>
                <th scope="col">Courses</th>
                <th scope="col">Student</th>
                <th scope="col">Batch</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($payments && count($payments) > 0)
                @foreach ($payments as $payment)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $payment->amount ?? 'N/A' }}</td>
                        <td>{{ $payment->entrollment->batch->course->name ?? 'N/A' }}</td>
                        <td>{{ $payment->entrollment->student->name ?? 'N/A' }}</td>
                        <td>{{ $payment->entrollment->batch->name ?? 'N/A' }}</td>
                        <td>
                            <a class='btn btn-success me-2' 
                               href="{{ route('payment.view', encrypt($payment->payment_Id)) }}">View</a>
                            <a class='btn btn-primary me-2' 
                               href="{{ route('payment.edit', encrypt($payment->payment_Id)) }}">Edit</a>
                            <a class='btn btn-danger' 
                               href="{{ route('payment.delete', encrypt($payment->payment_Id)) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center text-danger"><strong>No payments available</strong></td>
                </tr>
            @endif
        </tbody>
    </table>
    
</div>
    
    @endsection
    