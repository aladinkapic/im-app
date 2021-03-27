@extends("layouts.public-layout")

@section('other-js-link')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAApiBLPehhhJkDFqzlfNGN99n18N4PZxA"></script>
    <script  type="text/javascript" src="{{asset('js/public/contact/contact.js')}}"></script>
@stop

@section('breadcrumb-left') {{__('Dobrodošli na webstranicu Firma D.O.O')}} @endsection
@section('breadcrumb-right') <a href="#">{{__('Kontaktirajte nas')}}</a> @endsection

@section('other-js-link')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAApiBLPehhhJkDFqzlfNGN99n18N4PZxA"></script>
    <script  type="text/javascript" src="{{asset('js/public/contact/contact.js')}}"></script>
@stop

@section('body')
    <div class="main_wrapper">

        <!-- google map with custom style and marker -->

        <div id="google_map"></div>



        <div class="resized_wrapper">
            <div class="contact-info">
                <div class="ci-line"> <div class="line"></div> </div>
                <div class="ci-rest">
                    <div class="ci-r-header">
                        <h3>Sarajevo, <span>Bosna i Hercegovina</span></h3>
                    </div>

                    <div class="ci-r-two-columns">
                        <div class="ci-r-tc-column">
                            <p class="adress_details">
                                Muhameda ef. Pandže 55<br>
                                71000 Sarajevo, Bosna i Hercegovina
                            </p>
                            <h5>{{__('EMAIL ADRESE')}}</h5>
                            <p>
                                <i class="fas fa-at"></i> <span title="{{__('Naš gmail račun')}}">alkaris@gmail.com</span> <br>
                                <i class="fas fa-at"></i> <span title="{{__('Naš info račun')}}">info@alkaris.com</span>
                            </p>
                        </div>
                        <div class="ci-r-tc-column">
                            <h4>{{__('POZOVITE NAS')}}</h4>

                            <h3>(+387) 61 683 449</h3>
                            <h3>(+387) 62 759 331</h3>

                            <h5>Radno vrijeme</h5>
                            <p>{{__('Ponedjeljak - Petak : 9:00 - 17:00')}}</p>
                            <p>{{__('Subota : 9:00 - 14:00')}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-info">
                <div class="ci-line"> <div class="line"></div> </div>
                <div class="ci-rest">
                    <div class="ci-form-header">
                        {!! Form::text('name', '', ['class' => 'contact-input', 'id' => 'name', 'placeholder' => __('Vaše ime')]) !!}
                        {!! Form::email('email', '', ['class' => 'contact-input', 'id' => 'email', 'placeholder' => __('Vaš email')]) !!}
                        {!! Form::text('subject', '', ['class' => 'contact-input', 'id' => 'subject', 'placeholder' => __('Naslov poruke')]) !!}
                    </div>

                    <div class="ci-form-message">
                        {!! Form::textarea('message', '', ['class' => 'contact-input', 'id' => 'message', 'placeholder' => __('Vaša poruka')]) !!}
                    </div>

                    <div class="ci-button">
                        <button class="contact-us-btn">{{__('POŠALJITE PORUKU')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





