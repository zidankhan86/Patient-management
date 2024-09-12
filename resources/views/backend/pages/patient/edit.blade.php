@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Patient</h4>
                        <p class="text-muted m-b-15 f-s-12">Modify the details to update the patient's information.</p>
                        <div class="basic-form">
                            <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control input-default" name="name"
                                            value="{{ old('name', $patient->name) }}" placeholder="Name" required maxlength="255">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <input type="number" class="form-control input-default" name="age"
                                            value="{{ old('age', $patient->age) }}" placeholder="Age" required min="0">
                                        @error('age')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <select class="form-control input-default" name="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male" {{ old('gender', $patient->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender', $patient->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Other" {{ old('gender', $patient->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('gender')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="tel" class="form-control input-default" name="phone"
                                            value="{{ old('phone', $patient->phone) }}" placeholder="Phone Number" required maxlength="20">
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control input-default" name="email"
                                            value="{{ old('email', $patient->email) }}" placeholder="Email Address" required maxlength="100">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control input-default" name="address" placeholder="Address">{{ old('address', $patient->address) }}</textarea>
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <select class="form-control input-default" name="patient_type" required>
                                        <option value="">Select Patient Type</option>
                                        <option value="Consultancy" {{ old('patient_type', $patient->patient_type) == 'Consultancy' ? 'selected' : '' }}>Consultancy</option>
                                        <option value="Operation" {{ old('patient_type', $patient->patient_type) == 'Operation' ? 'selected' : '' }}>Operation</option>
                                    </select>
                                    @error('patient_type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Patient</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
