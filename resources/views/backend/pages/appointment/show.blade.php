@extends('backend.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Appointment Details Card -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <a class="btn btn-warning float-end ml-2" href="{{ route('appointments.index') }}">Back to
                            List</a>
                        <h4 style="text-align: center"><b>Appointment Details</b></h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="appointment_date"><b>Date:</b></label>
                                <p id="appointment_date">{{
                                    \Carbon\Carbon::parse($appointment->appointment_date)->format('F j, Y, g:i A') }}
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="type"><b>Type:</b></label>
                                <p id="type">{{ $appointment->type }}</p>
                            </div>
                            <div class="form-group">
                                <label for="status"><b>Status:</b></label>
                                <p id="status">{{ $appointment->status }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="patient"><b>Patient:</b></label>
                                <p id="patient">
                                    <a href="{{ route('patients.show', $appointment->patient->id) }}">
                                        {{ $appointment->patient->name }}
                                    </a>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="doctor"><b>Doctor:</b></label>
                                <p id="doctor">
                                    <a href="{{ route('doctors.show', $appointment->doctor->id) }}">
                                        {{ $appointment->doctor->name }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0"><b>Prescriptions</b></h5>
                        <!-- Button to trigger add prescription modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#createPrescriptionModal">
                            Add Prescription
                        </button>
                    </div>

                    @if($appointment->prescriptions->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Issued At</th>
                                    <th>Details</th>
                                    <th>Doctor</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointment->prescriptions as $prescription)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($prescription->issued_at)->format('d F Y H:i') }}</td>
                                    <td>{{ $prescription->prescription_details }}</td>
                                    <td>{{ $prescription->doctor->name }}</td>
                                    <td>
                                        <!-- View Prescription Button -->
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#viewPrescriptionModal-{{ $prescription->id }}">
                                            View
                                        </button>

                                        <!-- Edit Prescription Button -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#editPrescriptionModal-{{ $prescription->id }}">
                                            Edit
                                        </button>

                                        <!-- Delete Prescription Button -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deletePrescriptionModal-{{ $prescription->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>


                                <!-- View Prescription Modal -->
                                @include('backend.pages.prescriptions.modals.view', ['prescription' => $prescription])

                                <!-- Edit Prescription Modal -->
                                @include('backend.pages.prescriptions.modals.edit', ['prescription' => $prescription])

                                <!-- Delete Prescription Modal -->
                                @include('backend.pages.prescriptions.modals.delete', ['prescription' => $prescription])
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

        <!-- Create Prescription Modal -->

        @include('backend.pages.prescriptions.modals.create')

        <!-- Check if the appointment type is 'Operation' before showing the Surgery Details card -->
        @if($appointment->type === 'Operation')
        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0"><b>Surgery Details</b></h5>
                        <!-- Button to trigger add surgery details modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#createSurgeryDetailsModal">
                            Add Surgery Details
                        </button>
                    </div>

                    @if($appointment->surgeryDetails)
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
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($appointment->surgeryDetails->surgery_date)->format('d
                                        F Y H:i') }}</td>
                                    <td>{{ $appointment->surgeryDetails->surgery_type }}</td>
                                    <td>{{ $appointment->surgeryDetails->notes }}</td>
                                    <td>
                                        <a href="{{ route('doctors.show', $appointment->surgeryDetails->doctor->id) }}">
                                            {{ $appointment->surgeryDetails->doctor->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <!-- View Surgery Details Button -->
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#viewSurgeryDetailsModal-{{ $appointment->surgeryDetails->id }}">
                                            View
                                        </button>

                                        <!-- Edit Surgery Details Button -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#editSurgeryDetailsModal-{{ $appointment->surgeryDetails->id }}">
                                            Edit
                                        </button>

                                        <!-- Delete Surgery Details Button -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteSurgeryDetailsModal-{{ $appointment->surgeryDetails->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p class="text-center">No surgery details found.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Create Surgery Details Modal -->
        @include('backend.pages.surgery_details.modals.create')

        <!-- Edit Surgery Details Modal -->
        @if($appointment->surgeryDetails)
        @include('backend.pages.surgery_details.modals.edit', ['surgeryDetail' => $appointment->surgeryDetails])
        @endif

        <!-- View Surgery Details Modal -->
        @if($appointment->surgeryDetails)
        @include('backend.pages.surgery_details.modals.view', ['surgeryDetail' => $appointment->surgeryDetails])
        @endif

        <!-- Delete Surgery Details Modal -->
        @if($appointment->surgeryDetails)
        @include('backend.pages.surgery_details.modals.delete', ['surgeryDetail' => $appointment->surgeryDetails])
        @endif
        @endif


        <!-- Procedures Card -->
        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0"><b>Procedures</b></h5>
                        <!-- Button to trigger create procedure modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#createProcedureModal">
                            Add Procedure
                        </button>
                    </div>
                    @if($appointment->procedures->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Performed At</th>
                                    <th>Type</th>
                                    <th>Details</th>
                                    <th>Doctor</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointment->procedures as $procedure)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($procedure->performed_at)->format('d F Y H:i') }}</td>
                                    <td>{{ $procedure->procedure_type }}</td>
                                    <td>{{ $procedure->procedure_details }}</td>
                                    <td>{{ $procedure->doctor->name }}</td>
                                    <td>
                                        <!-- View Procedure Button -->
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#viewProcedureModal-{{ $procedure->id }}">
                                            View
                                        </button>

                                        <!-- Edit Procedure Button -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#editProcedureModal-{{ $procedure->id }}">
                                            Edit
                                        </button>

                                        <!-- Delete Procedure Button -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteProcedureModal-{{ $procedure->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>

                                <!-- View Procedure Modal -->
                                @include('backend.pages.procedures.modals.view', ['procedure' => $procedure])

                                <!-- Edit Procedure Modal -->
                                @include('backend.pages.procedures.modals.edit', ['procedure' => $procedure])

                                <!-- Delete Procedure Modal -->
                                @include('backend.pages.procedures.modals.delete', ['procedure' => $procedure])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p class="text-center">No procedures found.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Include the Create Procedure Modal -->
        @include('backend.pages.procedures.modals.create')





        <!-- Billing Card -->
        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0"><b>Billings</b></h5>
                        <!-- Button to trigger create billing modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#createBillingModal">
                            Add Billing
                        </button>
                    </div>
                    @if($appointment->billing)
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
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($appointment->billing->issued_at)->format('d F Y H:i')
                                        }}</td>
                                    <td>{{ $appointment->billing->amount }}</td>
                                    <td>{{ $appointment->billing->status }}</td>
                                    <td>
                                        <!-- View Billing Button -->
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#viewBillingModal-{{ $appointment->billing->id }}">
                                            View
                                        </button>

                                        <!-- Edit Billing Button -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#editBillingModal-{{ $appointment->billing->id }}">
                                            Edit
                                        </button>

                                        <!-- Delete Billing Button -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteBillingModal-{{ $appointment->billing->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>

                                <!-- View Billing Modal -->
                                @include('backend.pages.billings.modals.view', ['billing' => $appointment->billing])

                                <!-- Edit Billing Modal -->
                                @include('backend.pages.billings.modals.edit', ['billing' => $appointment->billing])

                                <!-- Delete Billing Modal -->
                                @include('backend.pages.billings.modals.delete', ['billing' => $appointment->billing])
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p class="text-center">No billing information found.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Include the Create Billing Modal -->
        @include('backend.pages.billings.modals.create')

    </div>
</div>



<!-- Create Prescription Modal -->



@endsection
