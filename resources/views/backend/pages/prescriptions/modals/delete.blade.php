<div class="modal fade" id="deletePrescriptionModal-{{ $prescription->id }}" tabindex="-1" role="dialog" aria-labelledby="deletePrescriptionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('prescriptions.destroy', $prescription->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deletePrescriptionLabel">Delete Prescription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this prescription?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete Prescription</button>
                </div>
            </form>
        </div>
    </div>
</div>
