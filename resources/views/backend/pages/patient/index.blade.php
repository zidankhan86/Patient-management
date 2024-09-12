

@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <a class="btn btn-warning float-end ml-2" href="{{ route('patients.create') }}">+ Create</a>
                <h4 style="text-align: center"><b>Patients List</b></h4>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $index => $patient)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->age }}</td>
                                <td>{{ $patient->gender }}</td>
                                <td>{{ $patient->patient_type }}</td>
                                <td class="color-primary">
                                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-success">EDIT</a>
                                    <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info">INFO</a>

                                    <form action="{{ route('doctors.destroy', $patient->id) }}" method="POST" style="display:inline;">
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

