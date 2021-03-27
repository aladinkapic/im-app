@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="far fa-images"></i> @endsection
@section('ph-main') {{__('Pregled slidera')}} @endsection
@section('ph-short')
    {{__('Pregledajte sve slidere na naslovnoj stranici')}}
    | <a href="{{route('system.homepage.slider.create')}}">{{__('Unesite novi')}}</a>
@endsection

@section('ph-navigation')
    / <a href="{{route('system.homepage.slider.index')}}">{{__('Slider')}}</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('right-menu') @include('system.app.products.includes.right-click-menu') @endsection

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.template.snippets.filters', ['var' => $slides])
        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                @include('system.template.snippets.filters_header')
                <th width="120px" class="akcije text-center w-120">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($slides as $slide)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $slide->title ?? '' }} </td>
                    <td> {{ $slide->description ?? ''}} </td>
                    <td> <a href="{{ $slide->link ?? ''}}">Pogledajte ovdje</a> </td>

                    <td class="text-center">
                        <a href="{{route('system.homepage.slider.edit', ['id' => $slide->id])}}" title="Pregled instanci šifarnika">
                            <button class="btn-dark btn-xs">Pregled</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
