<div class="modal fade" id="editPrescriptionModal-{{ $prescription->id }}" tabindex="-1" role="dialog" aria-labelledby="editPrescriptionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('prescriptions.update', $prescription->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editPrescriptionLabel">Edit Prescription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                    <input type="hidden" name="doctor_id" value="{{ $appointment->doctor->id }}">
                

                    <div class="form-group">
                        <label for="prescription_details">Prescription Details</label>
                        <textarea class="form-control" name="prescription_details" rows="3" required>{{ $prescription->prescription_details }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="issued_at">Issued At</label>
                        <input type="datetime-local" class="form-control" name="issued_at" value="{{ \Carbon\Carbon::parse($prescription->issued_at)->format('Y-m-d\TH:i') }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Prescription</button>
                </div>
            </form>
        </div>
    </div>
</div>
