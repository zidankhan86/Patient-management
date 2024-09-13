<div class="modal fade" id="createProcedureModal" tabindex="-1" role="dialog" aria-labelledby="createProcedureLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('procedures.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createProcedureLabel">Add Procedure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                    <input type="hidden" name="patient_id" value="{{ $appointment->patient->id }}">
                    <input type="hidden" name="doctor_id" value="{{ $appointment->doctor->id }}">

                    <div class="form-group">
                        <label for="procedure_type">Procedure Type</label>
                        <select class="form-control" name="procedure_type" required>
                            <option value="Consultancy">Consultancy</option>
                            <option value="Surgery">Surgery</option>
                            <option value="Diagnostic">Diagnostic</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="performed_at">Performed At</label>
                        <input type="datetime-local" class="form-control" name="performed_at" required>
                    </div>

                    <div class="form-group">
                        <label for="procedure_details">Details</label>
                        <textarea class="form-control" name="procedure_details" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Procedure</button>
                </div>
            </form>
        </div>
    </div>
</div>
