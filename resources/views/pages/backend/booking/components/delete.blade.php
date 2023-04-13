<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="text-muted font-size-16 mb-4">Please confirm that you
                wish to remove the record customer
                {{ $bookingDatas['customer_name'] }} - on Room No
                @foreach ($bookingDatas['room_list'] as $index => $room_lists)
                    @if ($room_lists['booking_id'] == $bookingDatas['id'])
                        {{ $room_lists['room'] }} on branch
                        {{ $bookingDatas['branch'] }}
                    @endif
                @endforeach.
            </p>
        </div>
        <div class="modal-footer">
            <form autocomplete="off" method="POST"
                action="{{ route('booking.delete', ['id' => $bookingDatas['id']]) }}">
                @method('PUT')
                @csrf
                <button type="submit" class="btn btn-danger">Yes,
                    Delete</button>
            </form>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Get Back</button>
        </div>
    </div>
</div>
