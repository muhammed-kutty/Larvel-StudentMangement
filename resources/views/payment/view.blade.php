@extends('layoutes.master')
@section('title', 'View-student')
@section('content')


<div class="container ">

    
    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Student Details</h1>
    </div>
    <div class=" d-flex justify-content-center align-items-center">

        <div class="card mb-3 mt-4 " style="min-width: 740px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://via.placeholder.com/150" class="img-fluid rounded-start" alt="...">
                </div>
          <div class="col-md-8">
            <div class="card-body">
               <h5 class="card-title"><strong>{{$student->name}}</strong></h5>
               <hr>
              <p class="card-text">Adress:- {{$student->adress}}</p>
              <p class="card-text">mobile:- {{$student->mobile}}</p>
              <p class="card-text">Age:- {{$student->age}}</p>
            </div>
          </div>
        </div>
    </div>
    </div>
</div>
@endsection
