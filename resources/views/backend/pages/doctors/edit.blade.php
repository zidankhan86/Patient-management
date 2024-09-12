@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
                <h4 class="card-title">Edit Doctor Details</h4>
                <p class="text-muted m-b-15 f-s-12">Update the details of the doctor.</p>
                <div class="basic-form">
                    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" class="form-control input-default" name="name"
                                value="{{ old('name', $doctor->name) }}" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-flat" name="specialization"
                                value="{{ old('specialization', $doctor->specialization) }}"
                                placeholder="Specialization">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control input-rounded" name="email"
                                value="{{ old('email', $doctor->email) }}" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control input-default" name="phone"
                                value="{{ old('phone', $doctor->phone) }}" placeholder="Phone Number">
                        </div>

                        <div class="form-group">
                            <input type="tel" class="form-control input-default" name="address"
                                value="{{ old('address', $doctor->address) }}">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control input-default" name="title"
                                value="{{ old('title', $doctor->title) }}">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control input-default" name="image"
                                value="{{ old('image', $doctor->image) }}">
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                        </div>
                
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
