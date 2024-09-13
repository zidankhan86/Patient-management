<div class="modal fade" id="viewAppointmentModal-{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="viewAppointmentLabel-{{ $appointment->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewAppointmentLabel-{{ $appointment->id }}">Appointment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d F Y, g:i A') }}</p>
                <p><strong>Type:</strong> {{ $appointment->type }}</p>
                <p><strong>Status:</strong> {{ $appointment->status }}</p>
                <p><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
