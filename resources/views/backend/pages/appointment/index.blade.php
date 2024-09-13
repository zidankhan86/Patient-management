

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
                            <th scope="col">Patient Name</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Date & Time</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointments as $index => $appointment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $appointment->patient->name }}</td>
                                <td>{{ $appointment->doctor->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y h:i A') }}</td>
                                <td>{{ $appointment->type }}</td>
                                <td>{{ $appointment->status }}</td>
                                <td class="color-primary">
                                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-success">EDIT</a>
                                    <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-info">INFO</a>
                
                                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this appointment?')">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No appointments available</td>
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

