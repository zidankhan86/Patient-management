

@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <a class="btn btn-warning float-end ml-2" href="">+ Add</a>
                <h4 style="text-align: center"><b>Category</b></h4>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">serial</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      

         
                        <tr>
                            <th></th>
                            <td></td>
                            <td>
                            </td>
                            
                            <td class="color-primary">
                                <a href="" class="btn btn-success"> EDIT</a>
                                <a href="" class="btn btn-danger" onclick="return confirm('Do you want to delete ?')">  DELETE</a>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

