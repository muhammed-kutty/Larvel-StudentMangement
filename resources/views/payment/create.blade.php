@extends('layoutes.master')
@section('title', 'create-student')
@section('content')

    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Create Pyment Details</h1>
    </div>

    <div style="width: 400px" class="mx-auto">
        <form action="{{route('payment.save')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" placeholder="Amount" >
            </div>
            <div class="mb-3">
                <label for="exampleSelect" class="form-label">Select an Enrollment NO:-</label>
                <select class="form-select" id="exampleSelect" name="entrolment_Id">
                    <option selected disabled>Select an option</option>
                    @foreach ($entrollment as $item)
                    <option value="{{$item->entrollment_Id }}">{{$item->entroll_No}}</option>
                    @endforeach
                </select>
            </div>
           
            <div class="mb-3">
                <label  class="form-label">Date</label>
                <input type="date" placeholder="Date"  name="paid_date" class="form-control" >
            </div>
           
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
@endsection
