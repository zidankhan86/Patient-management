@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Doctor</h4>
                        <p class="text-muted m-b-15 f-s-12">Fill in the details to add a new doctor.</p>
                        <div class="basic-form">
                            <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control input-default" name="name"
                                            value="{{ old('name') }}" placeholder="Name">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <input type="tel" class="form-control input-default" name="phone"
                                            value="{{ old('phone') }}" placeholder="Phone Number">
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <input type="email" class="form-control input-default" name="email"
                                            value="{{ old('email') }}" placeholder="Email Address">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control input-default" name="specialization"
                                        value="{{ old('specialization') }}" placeholder="Specialization">
                                    @error('specialization')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-default" name="address"
                                        value="{{ old('address') }}" placeholder="Address">
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-default" name="title"
                                        value="{{ old('title') }}" placeholder="MBBS">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control input-default" name="image">
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add Doctor</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
