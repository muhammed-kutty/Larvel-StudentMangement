@extends('layoutes.master')
@section('title', 'users-home')
@section('content')
<div class="container">

    <h1 class='mt-5 text-center fw-bolder'>users Details</h1>
    <div class='d-flex justify-content-end'>
        <a class='btn btn-primary ' href="{{route('user.create')}}">New</a>
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
                <th scope="col">User Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($users && count($users) > 0)
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $user->name ?? 'N/A' }}</td>
                        <td>{{ $user->username ?? 'N/A' }}</td>
                        <td>{{ $user->mobile ?? 'N/A' }}</td>
                        <td>{{ $user->role ?? 'N/A' }}</td>
                        <td>
                            <a class='btn btn-success me-2' 
                               href="{{ route('user.view', encrypt($user->user_Id)) }}">View</a>
                            <a class='btn btn-primary me-2' 
                               href="{{ route('user.edit', encrypt($user->user_Id)) }}">Edit</a>
                            <a class='btn btn-danger' 
                               href="{{ route('user.delete', encrypt($user->user_Id)) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center text-danger"><strong>No users available</strong></td>
                </tr>
            @endif
        </tbody>
    </table>
    
</div>
    
    @endsection
    