<div class="modal fade" id="viewProcedureModal-{{ $procedure->id }}" tabindex="-1" role="dialog" aria-labelledby="viewProcedureLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewProcedureLabel">View Procedure</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Performed At:</strong> {{ \Carbon\Carbon::parse($procedure->performed_at)->format('d F Y H:i') }}</p>
                <p><strong>Procedure Type:</strong> {{ $procedure->procedure_type }}</p>
                <p><strong>Details:</strong> {{ $procedure->procedure_details }}</p>
                <p><strong>Doctor:</strong> {{ $procedure->doctor->name }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
