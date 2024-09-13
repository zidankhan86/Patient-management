@extends('backend.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Patient Details Card -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <a class="btn btn-warning float-end ml-2" href="{{ route('patients.index') }}">Back to List</a>
                        <h4 style="text-align: center"><b>Patient Details</b></h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name"><b>Name:</b></label>
                                <p id="name">{{ $patient->name }}</p>
                            </div>
                            <div class="form-group">
                                <label for="age"><b>Age:</b></label>
                                <p id="age">{{ $patient->age }}</p>
                            </div>
                            <div class="form-group">
                                <label for="gender"><b>Gender:</b></label>
                                <p id="gender">{{ $patient->gender }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone"><b>Phone:</b></label>
                                <p id="phone">{{ $patient->phone }}</p>
                            </div>
                            <div class="form-group">
                                <label for="email"><b>Email:</b></label>
                                <p id="email">{{ $patient->email }}</p>
                            </div>
                            <div class="form-group">
                                <label for="patient_type"><b>Type:</b></label>
                                <p id="patient_type">{{ $patient->patient_type }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Appointments Card -->
      <!-- Appointments Card -->
      <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><b>Appointments</b></h5>
                @if($patient->appointments->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Appointment Date</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Doctor</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patient->appointments as $appointment)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d F Y, g:i A') }}</td>
                                        <td>{{ $appointment->type }}</td>
                                        <td>{{ $appointment->status }}</td>
                                        <td>
                                            <a href="{{ route('doctors.show', $appointment->doctor->id) }}">
                                                {{ $appointment->doctor->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewAppointmentModal-{{ $appointment->id }}">View</button>
                                            @include('backend.pages.appointment.modals.view', ['appointment' => $appointment])
                                        </td>
                                    </tr>
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
        <!-- Prescriptions Card -->
        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title"><b>Prescriptions</b></h5>
                    </div>
                    @if($patient->prescriptions->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Issued At</th>
                                        <th>Prescription Details</th>
                                        <th>Doctor</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patient->prescriptions as $prescription)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($prescription->issued_at)->format('d F Y H:i') }}</td>
                                            <td>{{ $prescription->prescription_details }}</td>
                                            <td>
                                                <a href="{{ route('doctors.show', $prescription->doctor->id) }}">
                                                    {{ $prescription->doctor->name }}
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewPrescriptionModal-{{ $prescription->id }}">View</button>
                                                @include('backend.pages.prescriptions.modals.view', ['prescription' => $prescription])
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">No prescriptions found.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Surgery Details Card -->
        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Surgery Details</b></h5>
                    @if($patient->surgeryDetails->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Surgery Date</th>
                                        <th>Surgery Type</th>
                                        <th>Notes</th>
                                        <th>Doctor</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patient->surgeryDetails as $surgeryDetail)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($surgeryDetail->surgery_date)->format('d F Y H:i') }}</td>
                                            <td>{{ $surgeryDetail->surgery_type }}</td>
                                            <td>{{ $surgeryDetail->notes }}</td>
                                            <td>
                                                <a href="{{ route('doctors.show', $surgeryDetail->doctor->id) }}">
                                                    {{ $surgeryDetail->doctor->name }}
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewSurgeryDetailsModal-{{ $surgeryDetail->id }}">View</button>
                                                @include('backend.pages.surgery_details.modals.view', ['surgeryDetail' => $surgeryDetail])
                                            </td>
                                        </tr>
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

        <!-- Billings Card -->
        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Billings</b></h5>
                    @if($patient->billing->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Issued At</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patient->billing as $billing)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($billing->issued_at)->format('d F Y H:i') }}</td>
                                            <td>{{ $billing->amount }}</td>
                                            <td>{{ $billing->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewBillingModal-{{ $billing->id }}">View</button>
                                                @include('backend.pages.billings.modals.view', ['billing' => $billing])
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">No billing information found.</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
