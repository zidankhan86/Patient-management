@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Appointment</h4>
                        <p class="text-muted m-b-15 f-s-12">Fill in the details to schedule an appointment.</p>
                        <div class="basic-form">
                            <form action="{{ route('appointments.store') }}" method="POST">
                                @csrf

                                <!-- Patient Selection -->
                                <div class="form-group">
                                    <label for="patient_id">Select Patient</label>
                                    <select class="form-control input-default" name="patient_id" id="patient_id" required>
                                        <option value="">Choose a Patient</option>
                                        @foreach($patients as $patient)
                                            <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
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
                                            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
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
                                    <input type="datetime-local" class="form-control input-default" name="appointment_date"
                                           value="{{ old('appointment_date') }}" required>
                                    @error('appointment_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Appointment Type -->
                                <div class="form-group">
                                    <label for="type">Appointment Type</label>
                                    <select class="form-control input-default" name="type" id="type" required>
                                        <option value="">Select Type</option>
                                        <option value="Consultancy" {{ old('type') == 'Consultancy' ? 'selected' : '' }}>Consultancy</option>
                                        <option value="OT/Operation" {{ old('type') == 'OT/Operation' ? 'selected' : '' }}>OT/Operation</option>
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
                                        <option value="Scheduled" {{ old('status') == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                                        <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="Cancelled" {{ old('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create Appointment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
