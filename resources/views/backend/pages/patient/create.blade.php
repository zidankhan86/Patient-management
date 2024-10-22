@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Patient</h4>
                        <p class="text-muted m-b-15 f-s-12">Fill in the details to add a new patient.</p>
                        <div class="basic-form">
                            <form action="{{ route('patients.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control input-default" name="name"
                                            value="{{ old('name') }}" placeholder="Name" required maxlength="255">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <input type="number" class="form-control input-default" name="age"
                                            value="{{ old('age') }}" placeholder="Age" required min="0">
                                        @error('age')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <select class="form-control input-default" name="gender" required>
                                           
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                            
                                        </select>
                                        @error('gender')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="tel" class="form-control input-default" name="phone"
                                            value="{{ old('phone') }}" placeholder="Phone Number" required maxlength="20">
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control input-default" name="email"
                                            value="{{ old('email') }}" placeholder="Email Address" required maxlength="100">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control input-default" name="address" placeholder="Address">{{ old('address') }}</textarea>
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <select class="form-control input-default" name="patient_type" required>
                                       
                                        <option value="Consultancy" {{ old('patient_type') == 'Consultancy' ? 'selected' : '' }}>Consultancy</option>
                                        <option value="Operation" {{ old('patient_type') == 'Operation' ? 'selected' : '' }}>Operation</option>
                                    </select>
                                    @error('patient_type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add Patient</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
