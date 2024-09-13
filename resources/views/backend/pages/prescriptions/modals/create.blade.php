<div class="modal fade" id="createPrescriptionModal" tabindex="-1" role="dialog" aria-labelledby="createPrescriptionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('prescriptions.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createPrescriptionLabel">Create Prescription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">

                    <input type="hidden" name="doctor_id" value="{{ $appointment->doctor->id }}"> <!-- Automatically associate with appointment's doctor -->


                    <div class="form-group">
                        <label for="prescription_details">Prescription Details</label>
                        <textarea class="form-control" name="prescription_details" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="issued_at">Issued At</label>
                        <input type="datetime-local" class="form-control" name="issued_at" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Prescription</button>
                </div>
            </form>
        </div>
    </div>
</div>
