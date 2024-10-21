@extends('layoutes.master')
@section('title', 'View-entrollments')
@section('content')


<div class="container ">

    
    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Entrollments Details</h1>
    </div>
    <div class=" d-flex justify-content-center align-items-center">

        <div class="card mb-3 mt-4  " style="min-width: 540px;">
            <div class="row g-0">
                {{-- <div class="col-md-4">
                    <img src="https://via.placeholder.com/150" class="img-fluid rounded-start" alt="...">
                </div> --}}
          <div class="col-md-8">
            <div class="card-body">
               <h5 class="card-title"><strong>{{$entrollments->entroll_No}}</strong></h5>
               <hr>
              <p class="card-text">Fees:- {{$entrollments->fee}}</p>
              <p class="card-text">Batch Name:- {{$entrollments->batch->name}}</p>
              <p class="card-text">Student Name:- {{$entrollments->student->name}}</p>
              <p class="card-text">Course  Name:- {{$entrollments->batch->course->name}}</p>
              <p class="card-text">Admission Date:- {{$entrollments->admission_date}}</p>
            </div>
          </div>
        </div>
    </div>
    </div>
</div>
@endsection
