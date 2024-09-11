@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Input Style</h4>
                        <p class="text-muted m-b-15 f-s-12">Use the input classes on an <code>.input-default, .input-flat,
                                .input-rounded</code> for Default input.</p>
                        <div class="basic-form">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control input-default" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-flat" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control input-rounded" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control input-default" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-flat" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control input-rounded" placeholder="Password">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
