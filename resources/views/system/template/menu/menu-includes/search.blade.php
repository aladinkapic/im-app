<div class="main-search">
    <div class="search-input">
        {!! Form::text('search', '', ['class' => '', 'id' => 'main-search', 'autofocus' => 'true', 'placeholder' => 'Pretražite']) !!}
        <img src="{{asset('images/includes/search.png')}}" alt="" id="main-search-icon" title="{{__('Kliknite ovdje za pretraživanje')}}">
        <img src="{{asset('images/includes/exit.png')}}" alt="" id="main-search-exit" title="{{__('Zatvorite')}}">
    </div>

    <div class="results-wrapper">
        <a href="#">
            <div class="results-item">
                <p>Led lamp - Living rooms</p>
                <div class="arrow-wrapper">
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="results-item">
                <p>Small led lamp - Bed rooms</p>
                <div class="arrow-wrapper">
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="results-item">
                <p>Fancy circle LED Lamp</p>
                <div class="arrow-wrapper">
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </a>

        <div class="border-line"></div>

        <a href="#">
            <div class="results-item">
                <p>20 results for LED LAMPS </p>
                <div class="arrow-wrapper">
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="results-item">
                <p> Check out new Lamp - Straight Living room lamp with RGB Details </p>
                <div class="arrow-wrapper">
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </a>
    </div>

    <div class="search-notes">
        <p>NOTE : For closing search, press ESC button or type "close" in form</p>
    </div>
</div>
