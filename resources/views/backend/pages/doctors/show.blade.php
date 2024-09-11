@extends('backend.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Basic Doctor Info Card -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <a class="btn btn-warning float-end ml-2" href="{{ route('doctors.index') }}">Back to List</a>
                        <h4 style="text-align: center"><b>Doctor Details</b></h4>
                    </div>
                    <div class="row">
                        <!-- First Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name"><b>Name:</b></label>
                                <p id="name">{{ $doctor->name }}</p>
                            </div>
                            <div class="form-group">
                                <label for="specialization"><b>Specialization:</b></label>
                                <p id="specialization">{{ $doctor->specialization }}</p>
                            </div>
                            <div class="form-group">
                                <label for="email"><b>Email:</b></label>
                                <p id="email">{{ $doctor->email }}</p>
                            </div>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone"><b>Phone:</b></label>
                                <p id="phone">{{ $doctor->phone }}</p>
                            </div>
           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointments Card -->
        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Appointments</b></h5>
                    @if($doctor->appointments->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Appointment Date</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Patient Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctor->appointments as $appointment)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d F Y H:i') }}</td>
                                            <td>{{ $appointment->type }}</td>
                                            <td>{{ $appointment->status }}</td>
                                            <td>
                                                <a href="{{ route('patients.show', $appointment->patient_id) }}">
                                                    {{ $appointment->patient->name }}
                                                </a>
                                            </td>                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">No appointments found.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Surgery Details Card -->
        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Surgery Details</b></h5>
                    @if($doctor->surgeryDetails->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Surgery Date</th>
                                        <th>Surgery Type</th>
                                        <th>Notes</th>
                                        <th>Patient Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctor->surgeryDetails as $surgeryDetail)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($surgeryDetail->surgery_date)->format('d F Y H:i') }}</td>
                                            <td>{{ $surgeryDetail->surgery_type }}</td>
                                            <td>{{ $surgeryDetail->notes }}</td>
                                            <td>
                                                <a href="{{ route('patients.show', $surgeryDetail->patient_id) }}">
                                                    {{ $surgeryDetail->patient->name }}
                                                </a>
                                            </td>                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">No surgery details found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
