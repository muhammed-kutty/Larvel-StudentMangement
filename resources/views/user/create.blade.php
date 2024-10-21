@extends('layoutes.master')
@section('title', 'create-user')
@section('content')

    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Create User</h1>
    </div>

    <div style="width: 400px" class="mx-auto">
        <form action="{{route('user.save')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" >
            </div>
            <div class="mb-3">
                <label  class="form-label">User Name</label>
                <input type="text" name="username" class="form-control" placeholder="UserName" >
            </div>
            <div class="mb-3">
                <label  class="form-label">password</label>
                <input type="password" name="password" placeholder="Password" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="exampleSelect" class="form-label">Select an Role</label>
                <select class="form-select" id="exampleSelect" name="role">
                    <option selected disabled>Select an option</option>
                    <option value="staff">Staff</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label  class="form-label">mobile</label>
                <input type="number" placeholder="Mobile"  name="mobile" class="form-control" >
            </div>
           
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
@endsection
