@extends('backend.master')
@section('content')


<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <span class="display-5"><i class="icon-user gradient-4-text"></i></span>
                        <h2 class="mt-3">{{ $totalUsers }} Users</h2>
                        <p>Currently active</p><a href="javascript:void()" class="btn gradient-4 btn-lg border-0 btn-rounded px-5">Add
                            more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <span class="display-5"><i class="fa fa-heart"></i></span>
                        <h2 class="mt-3">52 Pataints</h2>
                        <p>Currently active</p><a href="javascript:void()" class="btn gradient-4 btn-lg border-0 btn-rounded px-5">Add
                            more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <span class="display-5"><i class="icon-grid"></i></span>
                        <h2 class="mt-3">52 Appoints</h2>
                        <p>Currently active</p><a href="javascript:void()" class="btn gradient-4 btn-lg border-0 btn-rounded px-5">Add
                            more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <span class="display-5"><i class="icon-user gradient-4-text"></i></span>
                        <h2 class="mt-3">52 Doctors</h2>
                        <p>Currently active</p><a href="javascript:void()" class="btn gradient-4 btn-lg border-0 btn-rounded px-5">Add
                            more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="active-member">
                        <div class="table-responsive">
                            <table class="table table-xs mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $id = 1;
                                    @endphp
                            
                                    @foreach ($users as $item)
                                    <tr>
                                        <th scope="row">{{ $id++ }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->phone }}</td>
                                       
                            
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    </div>
    
</div>
<!-- #/ container -->

@endsection
