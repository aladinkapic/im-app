@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-question-circle"></i> @endsection
@section('ph-main') Kreirajte FAQ @endsection
@section('ph-short') Unesite / pregledajte FAQ  @endsection

@section('ph-navigation')
    / <a href="#">Svi FAQ</a>
    / <a href="#">Kreirajte FAQ</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3 product-wrapper">

        <div class="row">
            <div class="col-md-12">
                @if(isset($post))
                    {!! Form::open(array('route' => 'system.faq.update-faq', 'action' => 'FAQController@updateFAQ')) !!}
                    {!! Form::hidden('id', $post->id ?? '', ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.faq.save-faq', 'action' => 'FAQController@saveFAQ')) !!}
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="question">Pitanje</label>
                                    {!! Form::text('question', $post->question ?? '-', ['class' => 'form-control', 'id' => 'questionHelp', 'aria-describedby'=>'questionHelp', 'required' => 'required', 'maxlength' => 100, ]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="answer">Odgovor</label>
                                        {!! Form::textarea('answer', $post->answer ?? '-', ['class' => 'form-control', 'id' => 'answerHelp', 'aria-describedby'=>'answerHelp', 'required' => 'required']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-sm btn-secondary">Ažurirajte informacije</button>
                        </div>
                    </div>
                {!! Form::close(); !!}

            <!----------------------------------------------------------------------------------------------------->


            </div>
        </div>



    </div>






@endsection
