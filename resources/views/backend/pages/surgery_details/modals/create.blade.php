<div class="modal fade" id="createSurgeryDetailsModal" tabindex="-1" role="dialog" aria-labelledby="createSurgeryDetailsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('surgery-details.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createSurgeryDetailsLabel">Add Surgery Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                    <input type="hidden" name="patient_id" value="{{ $appointment->patient->id }}">
                    <input type="hidden" name="doctor_id" value="{{ $appointment->doctor->id }}">

                    <div class="form-group">
                        <label for="surgery_type">Surgery Type</label>
                        <input type="text" class="form-control" name="surgery_type" required>
                    </div>

                    <div class="form-group">
                        <label for="surgery_date">Surgery Date</label>
                        <input type="datetime-local" class="form-control" name="surgery_date" required>
                    </div>

                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea class="form-control" name="notes" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Surgery Details</button>
                </div>
            </form>
        </div>
    </div>
</div>
