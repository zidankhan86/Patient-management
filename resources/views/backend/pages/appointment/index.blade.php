

@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <a class="btn btn-warning float-end ml-2" href="{{ route('appointments.create') }}">+ Create</a>
                <h4 style="text-align: center"><b>Appointment List</b></h4>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Name</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Date</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointments as $index => $patient)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $patient->patient->name }}</td>
                                <td>{{ $patient->doctor->name }}</td>
                                <td>{{ $patient->appointment_date }}</td>
                                <td>{{ $patient->type }}</td>
                                <td>{{ $patient->status }}</td>
                                <td class="color-primary">
                                    <a href="{{ route('appointments.edit', $patient->id) }}" class="btn btn-success">EDIT</a>
                                    <a href="" class="btn btn-info">INFO</a>

                                    <form action="{{ route('appointments.destroy', $patient->id) }}" method="POST" style="display:inline;">
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

