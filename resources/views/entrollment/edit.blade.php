@extends('layoutes.master')
@section('title', 'update-entrollment')
@section('content')

    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Update Entrollment Details</h1>
    </div>

    <div style="width: 400px" class="mx-auto">
        <form action="{{route('entrollment.update')}}" method="POST">
            @csrf
            <input hidden name="entrollment_Id" value="{{encrypt($entrollment->entrollment_Id)}}" />
            <div class="mb-3">
                <label  class="form-label">Entroll Number</label>
                <input type="text" value="{{$entrollment->entroll_No}}" name="entroll_No" class="form-control" placeholder="Name" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Fees</label>
                <input type="text" value="{{$entrollment->fee}}" name="fee" class="form-control" placeholder="Name" >
            </div>

            <div class="mb-3">
                <label class="form-label">Payment Status</label>
                <select name="payment_status" class="form-control">
                    <option value="" selected disabled>Select Status</option>
                            <option value="done" {{$entrollment->payment_status == 'done' ? 'selected' : ''}}>Done</option>
                            <option value="pending" {{$entrollment->payment_status == 'pending' ? 'selected' : ''}}>Pending</option>
                </select>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Batch</label>
                <select name="batch_Id"  class="form-control">
                    <option value="" selected disabled>Select Courses</option>
                    @foreach ($batch as $batch)
                    <option value="{{ $batch->batches_Id }}" 
                        {{ $batch->batches_Id === $entrollment->batch_Id ? 'selected' : '' }}>
                        {{ $batch->name }}
                    </option>
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Student</label>
                <select name="student_Id"  class="form-control">
                    <option value="" selected disabled>Select Courses</option>
                    @foreach ($student as $student)
                    <option value="{{ $student->student_Id }}" 
                        {{ $student->student_Id === $entrollment->student_Id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Starte Date</label>
                <input type="date" placeholder="Admission started Date" name="admission_date" value="{{$entrollment->admission_date}}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
@endsection
