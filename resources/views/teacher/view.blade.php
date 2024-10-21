@extends('layoutes.master')
@section('title', 'View-teacher')
@section('content')


<div class="container ">

    
    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Teacher Details</h1>
    </div>
    <div class=" d-flex justify-content-center align-items-center">

        <div class="card mb-3 mt-4 p-3" style="width: 540px;">
            <div class="row g-0">
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('storage/' . $teacher->image) }}" class="img-fluid rounded" alt="{{$teacher->name}}">
                </div>
          <div class="col-md-8">
            <div class="card-body">
               <h5 class="card-title"><strong>{{$teacher->name}}</strong></h5>
               <hr>
              <p class="card-text">Adress:- {{$teacher->adress}}</p>
              <p class="card-text">mobile:- {{$teacher->mobile}}</p>
              <p class="card-text">Age:- {{$teacher->age}}</p>
            </div>
          </div>
        </div>
    </div>
    </div>
</div>
@endsection
