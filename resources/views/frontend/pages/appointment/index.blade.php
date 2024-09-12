@extends('frontend.master')

@section('content')

<!-- contact section -->
<section class="contact_section layout_padding">
    <div class="container">
        <div class="heading_container text-center mb-5">
            <h2>Appointment</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="form_container contact-form p-4 rounded shadow-sm bg-white">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-row mb-3">
                            <div class="col-lg-6 mb-3">
                                <select class="form-control" name="doctor_id" required>
                                    <option value="">Choose a Doctor</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('doctor_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <select class="form-control" name="patient_id" required>
                                    <option value="">Choose a Patient</option>
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                                            {{ $patient->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('patient_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-row mb-3">
                            <div class="col-lg-6 mb-3">
                                <input type="datetime-local" class="form-control" name="appointment_date" value="{{ old('appointment_date') }}" required>
                                @error('appointment_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <select class="form-control" name="type" required>
                                    <option value="">Select Appointment Type</option>
                                    <option value="Consultancy" {{ old('type') == 'Consultancy' ? 'selected' : '' }}>Consultancy</option>
                                    <option value="Operation" {{ old('type') == 'Operation' ? 'selected' : '' }}>Operation</option>
                                </select>
                                @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <select class="form-control" name="status" required>
                                <option value="">Select Status</option>
                                <option value="Scheduled" {{ old('status') == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                <option value="Cancelled" {{ old('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="btn_box text-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Confirm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact section -->

@endsection
