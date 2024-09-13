<div class="modal fade" id="editProcedureModal-{{ $procedure->id }}" tabindex="-1" role="dialog" aria-labelledby="editProcedureLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('procedures.update', $procedure->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editProcedureLabel">Edit Procedure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="appointment_id" value="{{ $procedure->appointment_id }}">
                    <input type="hidden" name="patient_id" value="{{ $procedure->patient_id }}">
                    <input type="hidden" name="doctor_id" value="{{ $procedure->doctor_id }}">

                    <div class="form-group">
                        <label for="procedure_type">Procedure Type</label>
                        <select class="form-control" name="procedure_type" required>
                            <option value="Consultancy" {{ $procedure->procedure_type === 'Consultancy' ? 'selected' : '' }}>Consultancy</option>
                            <option value="Surgery" {{ $procedure->procedure_type === 'Surgery' ? 'selected' : '' }}>Surgery</option>
                            <option value="Diagnostic" {{ $procedure->procedure_type === 'Diagnostic' ? 'selected' : '' }}>Diagnostic</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="performed_at">Performed At</label>
                        <input type="datetime-local" class="form-control" name="performed_at" value="{{ \Carbon\Carbon::parse($procedure->performed_at)->format('Y-m-d\TH:i') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="procedure_details">Details</label>
                        <textarea class="form-control" name="procedure_details" rows="3" required>{{ $procedure->procedure_details }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Procedure</button>
                </div>
            </form>
        </div>
    </div>
</div>
