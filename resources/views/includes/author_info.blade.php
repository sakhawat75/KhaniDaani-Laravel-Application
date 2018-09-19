<div class="author-card sidebar-card">
    <div class="author-infos">
        <div class="author_avatar"> <img src="{{ route('home') }}/storage/images/profile_image/{{ $profile->profile_image }}" alt="Presenting the broken author avatar :D"> </div>
        <div class="author">
            <a href="{{ route('profile.show', ['profile' => $profile->id]) }} #profile"><h4>
                {{ $profile->user->name }}
            </h4></a>
            <p>Joined {{ $profile->created_at->toFormattedDateString() }}</p>
        </div>
        <div class="author-badges">
            <ul class="list-unstyled">
                @if($profile->user->isChef())
                <li> <span data-toggle="tooltip" data-placement="bottom" title="Have up to 10 dish for sale">
                        <img src="{{ URL::to('/') }}/images/svg/have_dish.png" alt="" class="svg">
                    </span> </li>
                @endif
                    @if($profile->user->isDsp())
                <li> <span data-toggle="tooltip" data-placement="bottom" title="Have delivery option">
                        <img src="{{ URL::to('/') }}/images/svg/delivery.png" alt="" class="svg">
                    </span> </li>
                    @endif
                    @if($profile->user->isPP())
                <li> <span data-toggle="tooltip" data-placement="bottom" title="Hosting his place for dish collection">
                        <img src="{{ URL::to('/') }}/images/svg/pcikerpoint.png" alt="" class="svg">
                    </span> </li>
                        @endif
            </ul>
        </div>
        <!-- end /.author -->
    </div>
    <!-- end /.author-infos -->
    <div class="freelance-status">
        <div class="author-badges">
            <div class="author-btn"> <button class="btn btn--md btn--round" data-toggle="modal" data-target="#messageModal"
                                             @if(auth()->id() == $profile->user_id)
                                             aria-disabled="true" disabled="disabled"

                        @endif
                >Message Chef</button> </div>
        </div>
    </div>
</div>

<!-- Modal for sending message -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message {{ $profile->user->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('messages.store_with_auth') }}" method="post" id="send_msg">
                    @csrf
                    <input type="hidden" name="sender_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="recipient_id" value="{{ $profile->user->id }}">

                    <div class="form-group">
                        <label for="msgText">Type your message Below</label>
                        <textarea class="form-control" id="msgText" placeholder="I want to buy your dish" name="body"></textarea>
                    </div>

                    {{-- <button type="submit" id="submit-form" class="d-none">send</button> --}}

                </form>
            </div>

            <div class="modal-footer">
                {{-- <label for="submit-form" tabindex="0"  class="btn btn-primary px-3 py-1">Send</label> --}}
                <button type="button" class="btn btn-primary px-3 py-1" form="send_msg" id="submit-form">Send</button>

                <button type="button" class="btn btn-secondary px-3 py-1" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div id="snackbar">Snackbar</div>

@push('scripts-footer-bottom')
<script type="text/javascript">
    $(document).ready(function () {

        //snackbar
        function snackbar($msg) {
            $('#snackbar').html($msg);
            $('#snackbar').toggleClass('show');
            setTimeout(function () {
                $('#snackbar').removeClass('show');
            }, 1600);
        }

        //send message
        $('#submit-form').click(function(e) {
            e.preventDefault();
            $("#messageModal").modal('hide');
            var body = $('#msgText').val();
            $('#msgText').val(' ');

            @auth
            $.ajax({
                url: '{{ route('messages.store') }}',
                method: "POST",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'sender_id': {{ auth()->id() }},
                    'recipient_id': {{ $profile->user->id }},
                    'body': body,
                },
            }).done( function(data) {
                console.log("data: " + data);
                snackbar('Message Sent Successfully');
                loadMessages();

            });
            @else
            snackbar('Please log in first to send message');
            @endauth
        });
    });
</script>
    @endpush