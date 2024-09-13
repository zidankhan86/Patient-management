<div class="modal fade" id="viewPrescriptionModal-{{ $prescription->id }}" tabindex="-1" role="dialog" aria-labelledby="viewPrescriptionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPrescriptionLabel">View Prescription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="view_prescription_details">Prescription Details:</label>
                    <p id="view_prescription_details">{{ $prescription->prescription_details }}</p>
                </div>

                <div class="form-group">
                    <label for="view_issued_at">Issued At:</label>
                    <p id="view_issued_at">{{ \Carbon\Carbon::parse($prescription->issued_at)->format('d F Y H:i') }}</p>
                </div>

                <div class="form-group">
                    <label for="view_doctor">Doctor:</label>
                    <p id="view_doctor">{{ $prescription->doctor->name }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
