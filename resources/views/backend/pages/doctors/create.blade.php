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
                            <form action="{{ route('doctors.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control input-default" name="name" value="{{ old('name') }}" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-flat" name="specialization" value="{{ old('specialization') }}" placeholder="Specialization" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control input-rounded" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control input-default" name="phone" value="{{ old('phone') }}" placeholder="Phone Number">
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
