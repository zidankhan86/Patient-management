<!-- View Billing Modal -->
<div class="modal fade" id="viewBillingModal-{{ $billing->id }}" tabindex="-1" role="dialog" aria-labelledby="viewBillingLabel-{{ $billing->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewBillingLabel-{{ $billing->id }}">Billing Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Issued At:</strong> {{ \Carbon\Carbon::parse($billing->issued_at)->format('d F Y H:i') }}</p>
                <p><strong>Amount:</strong> {{ $billing->amount }}</p>
                <p><strong>Status:</strong> {{ $billing->status }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
