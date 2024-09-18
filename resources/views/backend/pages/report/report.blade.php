@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h1 class="card-title">Appointment Report</h1>
                            <hr class="w-25 mx-auto">
                        </div>

                        <form action="{{ route('order.report.search') }}" method="get" class="mb-4">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="from_date">From Date:</label>
                                        <input name="from_date" type="date" class="form-control" id="from_date">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="to_date">To Date:</label>
                                        <input name="to_date" type="date" class="form-control" id="to_date">
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="submit" class="btn btn-success w-100">Search</button>
                                </div>
                            </div>
                        </form>

                        <div id="orderReport">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2>Appointment Reports - {{ date('Y-m-d') }}</h2>
                                <button onclick="printDiv('orderReport')" class="btn btn-outline-primary">
                                    <i class="fas fa-print"></i> Print Report
                                </button>
                            </div>
                            <table class="table table-bordered table-hover mt-3">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Patient Name</th>
                                        <th scope="col">Doctor Name</th>
                                        <th scope="col">Date & Time</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($Appointment))
                                        @forelse ($Appointment as $index => $appointment)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $appointment->patient->name }}</td>
                                                <td>{{ $appointment->doctor->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y h:i A') }}</td>
                                                <td>{{ ucfirst($appointment->type) }}</td>
                                                <td>
                                                    <span class="badge badge-{{ $appointment->status == 'Completed' ? 'success' : 'warning' }}">
                                                        {{ $appointment->status }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No appointments available</td>
                                            </tr>
                                        @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
