@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">


                            <br>
                            <h1>Appointment Report</h1><br>

                            <form action="{{ route('order.report.search') }}" method="get">

                                <div class="container">
                                    <div class="row align-items-end">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="from_date">From date:</label>
                                                <input name="from_date" type="date" class="form-control" id="from_date">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="to_date">To date:</label>
                                                <input name="to_date" type="date" class="form-control" id="to_date">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-success btn-block">Search</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <div id="orderReport">

                                <h1>Appointment Reports- {{ date('Y-m-d') }}</h1><br>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>

                                            <th scope="col">Serial</th>
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
                                            <td>{{ $appointment->type }}</td>
                                            <td>{{ $appointment->status }}</td>
                                            
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No appointments available</td>
                                        </tr>
                                    @endforelse
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <button onclick="printDiv('orderReport')" class="btn btn-success">Print</button>
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
