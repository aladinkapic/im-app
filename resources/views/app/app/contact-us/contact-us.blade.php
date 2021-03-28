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
                        <h3>Munchen, <span>Germany</span></h3>
                    </div>

                    <div class="ci-r-two-columns">
                        <div class="ci-r-tc-column">
                            <p class="adress_details">
                                Address with number<br>
                                65000 Munich, Germany
                            </p>
                            <h5>{{__('EMAIL ADRESE')}}</h5>
                            <p>
                                <i class="fas fa-at"></i> <span title="{{__('Naš gmail račun')}}">info@email.com</span> <br>
                            </p>
                        </div>
                        <div class="ci-r-tc-column">
                            <h4>{{__('POZOVITE NAS')}}</h4>

                            <h3>(+387) 61 683 449</h3>
                            <h3>(+387) 61 683 449</h3>

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
                        {!! Form::text('name', '', ['class' => 'contact-input', 'id' => 'name', 'placeholder' => __('Name')]) !!}
                        {!! Form::email('email', '', ['class' => 'contact-input', 'id' => 'email', 'placeholder' => __('E-Mail Adresse')]) !!}
                        {!! Form::text('subject', '', ['class' => 'contact-input', 'id' => 'subject', 'placeholder' => __('Telefon')]) !!}
                    </div>

                    <div class="ci-form-header">
                        {!! Form::text('name', '', ['class' => 'contact-input', 'id' => 'name', 'placeholder' => __('Was soll gereinigt werden?')]) !!}
                        {!! Form::email('email', '', ['class' => 'contact-input', 'id' => 'email', 'placeholder' => __('Wie viele qm2 ?')]) !!}
                        {!! Form::text('subject', '', ['class' => 'contact-input', 'id' => 'subject', 'placeholder' => __('Wie oft soll gereinigt werden?')]) !!}
                    </div>

                    <div class="ci-form-message">
                        {!! Form::textarea('message', '', ['class' => 'contact-input', 'id' => 'message', 'placeholder' => __('Nachricht')]) !!}
                    </div>

                    <br>

                    <div class="ci-button">
                        <button class="contact-us-btn">{{__('JETZT ANFRAGEN')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





