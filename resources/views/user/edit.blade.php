@extends('layoutes.master')
@section('title', 'update-user')
@section('content')

    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Update User</h1>
    </div>

    <div style="width: 400px" class="mx-auto">
        <form action="{{route('user.update')}}" method="POST">
            @csrf
            <input hidden name="user_Id" value="{{encrypt($user->user_Id)}}" />
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="Name" >
            </div>
            <div class="mb-3">
                <label  class="form-label">UserName</label>
                <input type="text" name="username" value="{{$user->username}}" placeholder="User Name" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="exampleSelect" class="form-label">Select an Role</label>
                <select class="form-select" id="exampleSelect" name="role">
                    <option selected disabled>Select an option</option>
                    <option value="staff" {{$user->role == 'staff' ? 'selected' : ''}}>Staff</option>
                </select>
            </div>
            <div class="mb-3">
                <label  class="form-label">mobile</label>
                <input type="number" placeholder="Mobile" value="{{$user->mobile}}"  name="mobile" class="form-control" >
            </div>
           
            <button type="submit" class="btn btn-primary mb-5">Update</button>
        </form>
    </div>
@endsection
