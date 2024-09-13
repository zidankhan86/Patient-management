<!-- Delete Billing Modal -->
<div class="modal fade" id="deleteBillingModal-{{ $billing->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteBillingLabel-{{ $billing->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('billing.destroy', $billing->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteBillingLabel-{{ $billing->id }}">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this billing entry?</p>
                    <p><strong>Issued At:</strong> {{ \Carbon\Carbon::parse($billing->issued_at)->format('d F Y H:i') }}</p>
                    <p><strong>Amount:</strong> {{ $billing->amount }}</p>
                    <p><strong>Status:</strong> {{ $billing->status }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
