

@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <a class="btn btn-warning float-end ml-2" href="{{ route('doctors.create') }}">+ Add</a>
                <h4 style="text-align: center"><b>Doctors List</b></h4>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Name</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($doctors as $index => $doctor)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->specialization }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->email }}</td>
                                <td class="color-primary">
                                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-success">EDIT</a>
                                    <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-info">INFO</a>

                                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this doctor?')">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

