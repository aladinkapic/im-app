@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-question-circle"></i> @endsection
@section('ph-main') Pregled svih FAQ @endsection
@section('ph-short') Pregledajte i pretražujte FAQ@endsection

@section('ph-navigation')
    / <a href="#">Svi FAQ</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('right-menu') @include('system.app.products.includes.right-click-menu') @endsection

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.template.snippets.filters', ['var' => $posts])
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
            @foreach($posts as $post)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $post->question ?? ''}} </td>
                    <td> {{ $post->answer ?? ''}} </td>

                    <td class="text-center">
                        <a href="{{route('system.faq.preview-faq', ['id' => $post->id])}}" title="Pregled FAQ">
                            <button class="btn-dark btn-xs">Pregled</button>
                        </a>
                        <a href="{{route('system.faq.delete-faq', ['id' => $post->id])}}" title="Obrišite FAQ">
                            <button class="btn-danger btn-xs"><b>Obrišite</b></button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
