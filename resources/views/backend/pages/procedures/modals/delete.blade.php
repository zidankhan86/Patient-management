<div class="modal fade" id="deleteProcedureModal-{{ $procedure->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteProcedureLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('procedures.destroy', $procedure->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProcedureLabel">Delete Procedure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this procedure?</p>
                    <p><strong>Performed At:</strong> {{ \Carbon\Carbon::parse($procedure->performed_at)->format('d F Y H:i') }}</p>
                    <p><strong>Procedure Type:</strong> {{ $procedure->procedure_type }}</p>
                    <p><strong>Details:</strong> {{ $procedure->procedure_details }}</p>
                    <p><strong>Doctor:</strong> {{ $procedure->doctor->name }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Procedure</button>
                </div>
            </form>
        </div>
    </div>
</div>
