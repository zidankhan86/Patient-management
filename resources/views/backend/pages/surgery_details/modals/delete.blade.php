<div class="modal fade" id="deleteSurgeryDetailsModal-{{ $surgeryDetail->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteSurgeryDetailsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('surgery-details.destroy', $surgeryDetail->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSurgeryDetailsLabel">Delete Surgery Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the surgery details for {{ $surgeryDetail->surgery_type }} on {{ \Carbon\Carbon::parse($surgeryDetail->surgery_date)->format('d F Y H:i') }}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
