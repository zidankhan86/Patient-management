@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Appointment</h4>
                        <p class="text-muted m-b-15 f-s-12">Update the details of the appointment.</p>
                        <div class="basic-form">
                            <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Patient Selection -->
                                <div class="form-group">
                                    <label for="patient_id">Select Patient</label>
                                    <select class="form-control input-default" name="patient_id" id="patient_id" required>
                                        <option value="">Choose a Patient</option>
                                        @foreach($patients as $patient)
                                            <option value="{{ $patient->id }}" {{ old('patient_id', $appointment->patient_id) == $patient->id ? 'selected' : '' }}>
                                                {{ $patient->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('patient_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Doctor Selection -->
                                <div class="form-group">
                                    <label for="doctor_id">Select Doctor</label>
                                    <select class="form-control input-default" name="doctor_id" id="doctor_id" required>
                                        <option value="">Choose a Doctor</option>
                                        @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}" {{ old('doctor_id', $appointment->doctor_id) == $doctor->id ? 'selected' : '' }}>
                                                {{ $doctor->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('doctor_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Appointment Date -->
                                <div class="form-group">
                                    <label for="appointment_date">Appointment Date</label>
                                    <input type="datetime-local" class="form-control input-default" name="appointment_date" id="appointment_date"
                                        value="{{ old('appointment_date', $appointment->appointment_date->format('Y-m-d\TH:i')) }}">
                                    @error('appointment_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>                                

                                <!-- Appointment Type -->
                                <div class="form-group">
                                    <label for="type">Appointment Type</label>
                                    <select class="form-control input-default" name="type" id="type" required>
                                        <option value="">Select Type</option>
                                        <option value="Consultancy" {{ old('type', $appointment->type) == 'Consultancy' ? 'selected' : '' }}>Consultancy</option>
                                        <option value="Operation" {{ old('type', $appointment->type) == 'Operation' ? 'selected' : '' }}>Operation</option>
                                    </select>
                                    @error('type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Appointment Status -->
                                <div class="form-group">
                                    <label for="status">Appointment Status</label>
                                    <select class="form-control input-default" name="status" id="status" required>
                                        <option value="">Select Status</option>
                                        <option value="Scheduled" {{ old('status', $appointment->status) == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                                        <option value="Completed" {{ old('status', $appointment->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="Cancelled" {{ old('status', $appointment->status) == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Appointment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
