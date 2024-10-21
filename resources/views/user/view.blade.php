@extends('layoutes.master')
@section('title', 'View-user')
@section('content')


<div class="container ">

    
    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>user Details</h1>
    </div>
    <div class=" d-flex justify-content-center align-items-center">

        <div class="card mb-3 mt-4 " style="min-width: 740px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://via.placeholder.com/150" class="img-fluid rounded-start" alt="...">
                </div>
          <div class="col-md-8">
            <div class="card-body">
               <h5 class="card-title"><strong>{{$user->name}}</strong></h5>
               <hr>
              <p class="card-text">UserName:- {{$user->username}}</p>
              <p class="card-text">mobile:- {{$user->mobile}}</p>
              <p class="card-text">Role:- {{$user->role}}</p>
            </div>
          </div>
        </div>
    </div>
    </div>
</div>
@endsection
