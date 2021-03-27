@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-envelope-open-text"></i> @endsection
@section('ph-main') Zaprimljene poruke @endsection
@section('ph-short') Pregledajte sve zaprimljene poruke sa sistema putem forme  @endsection

@section('ph-navigation')
    / <a href="{{route('system.settings.keywords.messages.preview-messages')}}"> Zaprimljene poruke </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.template.snippets.filters', ['var' => $messages])
        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                @include('system.template.snippets.filters_header')
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($messages as $message)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $message->name ?? ''}} </td>
                    <td> {{ $message->email ?? ''}} </td>
                    <td> {{ $message->subject ?? ''}} </td>
                    <td> {{ $message->message ?? ''}}</td>

                    <td class="text-center">
                        <a href="{{route('system.settings.keywords.messages.preview-message', ['id' => $message->id])}}" title="Pregled instanci šifarnika">
                            <button class="btn-dark btn-xs">Pregled</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
