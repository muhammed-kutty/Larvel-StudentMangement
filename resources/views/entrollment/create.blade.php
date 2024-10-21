@extends('layoutes.master')
@section('title', 'create-Entrollments')
@section('content')

    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Create Entrollments</h1>
    </div>

    <div style="width: 400px" class="mx-auto">
        <form action="{{ route('entrollment.save') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Entroll Number</label>
                <input type="text" name="entroll_No" class="form-control" placeholder="entroll_No">
            </div>
            <div class="mb-3">
                <label class="form-label">Fees</label>
                <input type="text" name="fee" class="form-control" placeholder="fee">
            </div>

            <div class="mb-3">
                <label class="form-label">Payment Status</label>
                <select name="payment_status" class="form-control">
                    <option value="" selected disabled>Select Status</option>
                            <option value="done">Done</option>
                            <option value="pending">Pending</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Batch</label>
                <select name="batch_Id" class="form-control">
                    <option value="" selected disabled>Select Batch</option>
                    @if ($batch && count($batch) > 0)
                        @foreach ($batch as $batch)
                            <option value="{{ $batch->batches_Id }}">{{ $batch->name }}</option>
                        @endforeach
                    @else
                        <option value="" selected>No batch Available</option>
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Student</label>
                <select name="student_Id" class="form-control">
                    <option value="" selected disabled>Select Student</option>
                    @if ($student && count($student) > 0)
                        @foreach ($student as $student)
                            <option value="{{ $student->student_Id }}">{{ $student->name }}</option>
                        @endforeach
                    @else
                        <option value="" selected>No student Available</option>
                    @endif
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">Admission Date</label>
                <input type="date" placeholder="Entrollment started Date" name="admission_date" class="form-control">
            </div>
         
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
@endsection
