@extends('layoutes.master')
@section('title', 'home')

@section('content')

    <main class="content">
        <div class="container-fluid p-0 text-center">
            <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
            <div class="row d-flex justify-content-center">
                <div class="w-25 me-3">
                    <div class="card" style="width: 18rem; height: 10rem; ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Students</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="users"></i>

                                    </div>
                                </div>
                            </div>
                            <h4 class="mt-4 mb-3">Total Students:-<strong>{{$students}}</strong></h4>
                           
                        </div>
                    </div>

				</div>
                <div class=" w-25 me-3">

                    <div class="card" style="width: 18rem; height: 10rem; ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Teachers</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
							<h4 class="mt-4 mb-3">Total Teachers:-<strong>{{$teachers}}</strong></h4>

                        </div>
                    </div>
                </div>

                <div class=" w-25 me-3">

                    <div class="card" style="width: 18rem; height: 10rem; ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Batches</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="book"></i>
                                    </div>
                                </div>
                            </div>
							<h4 class="mt-4 mb-3">Total Batches:-<strong>{{$batches}}</strong></h4>
                        </div>
                    </div>
                </div>

            </div>

            <hr>

            <div class="row d-flex justify-content-center mt-4 ">
                <div class="col-12 col-lg-8 col-xxl-9  ">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Student wise Payment Status</h5>
                        </div>
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th class="d-none d-xl-table-cell">Joining Date</th>
                                    <th class="d-none d-md-table-cell">Cource</th>
                                    <th class="d-none d-md-table-cell">Batch</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
								@foreach ($studentwisePaymentDetails as $item)
                                <tr>
                                    <td>{{$item->student->name ??'NA'}}</td>
                                    <td class="d-none d-xl-table-cell">{{$item->admission_date}}</td>
                                    <td class="d-none d-xl-table-cell">{{$item->batch->course->name ?? "NA"}}</td>
                                    <td class="d-none d-md-table-cell">{{$item->batch->name ?? "NA"}}</td>
                                    {{-- <td><span class={{$item->entrollment-> =='done' ? "badge bg-success" : ($item->payment_status == 'pending' ? 'badge bg-danger' : 'badge bg-warning') }}>{{$payment->payment_status}}</span></td> --}}
                                    <td><span class="{{$item->payment_status=='done' ? "badge bg-success" : ($item->payment_status == 'pending' ? 'badge bg-danger' : 'badge bg-warning') }}" >{{$item->payment_status}}</span></td>
                                </tr>
								@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </main>

@endsection
