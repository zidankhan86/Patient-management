<div class="modal fade" id="viewSurgeryDetailsModal-{{ $surgeryDetail->id }}" tabindex="-1" role="dialog" aria-labelledby="viewSurgeryDetailsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewSurgeryDetailsLabel">View Surgery Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Surgery Date:</strong> {{ \Carbon\Carbon::parse($surgeryDetail->surgery_date)->format('d F Y H:i') }}</p>
                <p><strong>Surgery Type:</strong> {{ $surgeryDetail->surgery_type }}</p>
                <p><strong>Notes:</strong> {{ $surgeryDetail->notes }}</p>
                <p><strong>Doctor:</strong> {{ $surgeryDetail->doctor->name }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
