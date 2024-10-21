@extends('layoutes.master')
@section('title', 'View-batches')
@section('content')


<div class="container ">

    
    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Batches Details</h1>
    </div>
    <div class=" d-flex justify-content-center align-items-center">

        <div class="card mb-3 mt-4 " style="min-width: 500px;">
            <div class="row g-0">
                {{-- <div class="col-md-4">
                    <img src="https://via.placeholder.com/150" class="img-fluid rounded-start" alt="...">
                </div> --}}
          <div class="col-md-8">
            <div class="card-body">
               <h5 class="card-title"><strong>{{$batches->name}}</strong></h5>
               <hr>
              <p class="card-text">Course Name:- {{$batches->course->name}}</p>
              <p class="card-text">Started Date:- {{$batches->start_date}}</p>
            </div>
          </div>
        </div>
    </div>
    </div>
</div>
@endsection
