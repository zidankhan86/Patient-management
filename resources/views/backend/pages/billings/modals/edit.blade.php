<!-- Edit Billing Modal -->
<div class="modal fade" id="editBillingModal-{{ $billing->id }}" tabindex="-1" role="dialog" aria-labelledby="editBillingLabel-{{ $billing->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('billing.update', $billing->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editBillingLabel-{{ $billing->id }}">Edit Billing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="appointment_id" value="{{ $billing->appointment_id }}">
                    <input type="hidden" name="patient_id" value="{{ $billing->patient_id }}">

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" step="0.01" class="form-control" name="amount" value="{{ $billing->amount }}" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" required>
                            <option value="Pending" {{ $billing->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Paid" {{ $billing->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                            <option value="Cancelled" {{ $billing->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="issued_at">Issued At</label>
                        <input type="datetime-local" class="form-control" name="issued_at" value="{{ \Carbon\Carbon::parse($billing->issued_at)->format('Y-m-d\TH:i') }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Billing</button>
                </div>
            </form>
        </div>
    </div>
</div>
