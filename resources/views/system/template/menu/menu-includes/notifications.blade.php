<div class="c-box">
    <div class="cb-header">
        <h4>OBAVIJESTI</h4>
        <div class="close-cb" title="Zatvorite">
            <i class="fas fa-times"></i>
        </div>
    </div>
    <div class="cb-body">
        @foreach($loggedUser->notificationsRel as $notification)
            <a href="{{$notification->link}}">
                <div class="not-content">
                    <div class="nc-img">
                        <i class="{{$notification->icon_class}}"></i>
                    </div>
                    <div class="nc-text">
                        <p> {!! $notification->body !!} </p>

                        <div class="dt">
                            <p> {{ $notification->getTime() }} </p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
</div>
